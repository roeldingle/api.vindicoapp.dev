<?php namespace App\Straightarrow\Modules\Auth;

use App\Straightarrow\Modules\Auth\AuthInterface as AuthRepository;
use App\Straightarrow\Modules\Auth\AuthValidation;
use App\Straightarrow\Modules\Token\TokenInterface as TokenRepository;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Hash;
use Event;
use Config;
use Carbon\Carbon;
use Auth;

class AuthGateway
{
  protected $authRepository;
  protected $tokenRepository;
  protected $hasher;
  //protected $photosRepository;

  public function __construct(AuthRepository $authRepository, TokenRepository $tokenRepository, AuthValidation $validation, HasherContract $hasher)
  {
    $this->authRepository   = $authRepository;
    $this->tokenRepository  = $tokenRepository;
    $this->validation  = $validation;
    $this->hasher  = $hasher;
  }

  public function login($data)
  {
      /* set a default access level value */
      $data['access_level'] = 2;
      $time = microtime();
      $key = Config::get('app.key');
      
      //these are the columns selected
      $columns  = ['*'];

      $login_with = isset($data['use']) ? $data['use'] : 'email';

       if($this->validation->isValidForLogin($data)) {
            
        //$user = $this->authRepository->findByEmail($data, $columns);
        $user = $this->authRepository->findByUsername($data, $columns);


        if( empty($user) ) {
          return ['valid'=>false,'error'=>'Invalid Email or Password.'];
        }

        $user_id = $user->id;

        if( $this->hasher->check($data['password'], $user->getAuthPassword()) ) {

          $token = base64_encode(("$time-$user_id-$key") );


          $event_data = [
            'user_id'     => $user_id,
            'api_token'   => $token,
            'expired_at'  => Carbon::now()->addDays(Config::get('app.expiration')),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
          ];

          //fire the event "auth.login" this will register the API token details
          Event::fire('auth.login', [$event_data]);
          $this->authRepository->update(['status' => 1], $user_id);
          return ['valid' => true, 'token' => $token];
        } else {
          return ['valid'=>false,'error'=>'Invalid Email or Password.'];
        }

      } else {
        $errors = $this->validation->errors()->first();
        return ['valid'=>false,'error'=>$errors];
      }


      
  }

  public function logout($token)
  {
    
    $tokenInfo = $this->tokenRepository->findUserIdByToken($token);
   
    if( empty($tokenInfo) ) {
      return ['valid'=>false,'error'=>'Expired token.'];
    }

    $user_id = $this->authRepository->find($tokenInfo->user_id, array('id'));
    $this->authRepository->update(['status' => 0], $user_id->id);

    
    if($this->tokenRepository->deleteByToken($token)){
      return ['valid'=>true,'message'=>'Successfully logged out.'];
    } else {
      return ['valid'=>false,'error'=>'Unknow error.'];
    }
  }

  public function changepassword($data) {
    //$this->authRepository->update($data, $user_id);

    $user = $this->authRepository->findByEmail($data, ['*']);
    if( empty($user) ) {
      return ['valid'=>false,'error'=>'Email is not yet registered.'];
    }

    $result = $this->authRepository->updatePassword(['password' => bcrypt($data['password'])], $user->id);

    if(!$result) {
      return ['valid'=>true,'error'=>'Something went wrong.'];
    }

    return ['valid'=>true,'message'=>'Password has been updated.'];
  }

  public function register($data)
  {

    if(!$this->validation->isValidForRegister($data)) {

      $errors = $this->validation->errors()->first();
      return ['valid'=>false,'error'=>$errors];
    }

    $user = $this->authRepository->createUser($data);

    $token = base64_encode(microtime().'-'. $user->id . '-' .Config::get('app.key'));
    $event_data = [
      'user_id'     => $user->id,
      'api_token'   => $token,
      'expired_at'  => Carbon::now()->addDays(Config::get('app.expiration')),
      'created_at'  => Carbon::now(),
      'updated_at'  => Carbon::now(),
    ];

    //fire the event "auth.login" this will register the API token details
    Event::fire('auth.login', [$event_data]);
    return ['valid' => true, 'token' => $token];
    
  }

}