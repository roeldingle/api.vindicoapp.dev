<?php namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\BaseApiController;
use App\Straightarrow\Modules\Auth\AuthGateway;
use App\Straightarrow\Modules\Auth\AuthValidation;
use Response, Request;
//use Input;
use Illuminate\Support\Facades\Input;
use Hash;
use Mail;

class AuthController extends BaseApiController
{

  protected $authGateway;
  protected $validator;


  public function __construct(AuthGateway $authGateway, AuthValidation $validator)
  {
    $this->authGateway = $authGateway;
    $this->validator = $validator;
  }

  /**
   * Authenticate the requesting client
   * POST /api/{api_version}/auth/login
   * @return json
   */
  public function postAuthenticate()
  {
    //$validator = $this->validator->test(Input::all());
    
    $isAuthenticated = $this->authGateway->login(Input::all());
    if($isAuthenticated['valid']){
      $response = ['status' => $isAuthenticated['valid'] , 'message' => 'Successfully login', 'token' => $isAuthenticated['token']];
      return Response::json($response, 200);
    }else{
      //check if there's a validation errors else the credentials is invalid
      $response = ['status' => $isAuthenticated['valid'], 'message' => 'Error logging in' ,'error' => $isAuthenticated['error']];
      return Response::json($response, 422);
    }
  }


  /**
   * Forgot password - Sends email to the user with its new password
   * [GET] /api/{api_version}/auth/forgot
   * @return json
   */
  public function postForgot(){

    $email = Input::get('email');

    $validator = $this->validator->isValidEmail(Input::all());



    if(!$validator) {
      $errors = $this->validator->errors()->first();
      return Response::json(['status'=>$validator,'error'=>$errors], 422);
    }

    $pwd = bin2hex(openssl_random_pseudo_bytes(4));


    $status = $this->authGateway->changepassword(['email'=>$email,'password'=>$pwd]);



    if(!$status['valid']) {
      return Response::json(['status'=>false,'error'=>$status['error']], 422);
    }
    


    $html = '
    <table cellpadding="0" cellspacing="0" width="600" border="0">
     <tr>
      <td style="font-size:14px;">
        <font face="arial">Here\'s your new password.<br>
        <strong>'.$pwd.'</strong>
        </font>
      </td>
     </tr>
    </table>

    ';

    Mail::send([], ['html'=>$html], function ($message) use($html) {
        $message->from('des6sys@gmail.com', 'Roy Vincent Niepes');
        $message->to('rmdingle@straightarrow.com.ph')->subject('Here\'s your New Password');
        $message->setBody($html,'text/html');
    });


    return Response::json(['status'=>true,'message'=>'Your new password has been sent.'], 200);

  }


  /**
   * Logs out the client
   * [GET] /api/{api_version}/auth/logout
   * @return json
   */
  public function getLogout()
  {
    $token = Request::header('X-Auth-Token');
    
    $isLoggedOut = $this->authGateway->logout($token);

    if($isLoggedOut['valid']){
      $response = ['status' => $isLoggedOut['valid'],  'message' => $isLoggedOut['message']];
      return Response::json($response, 200);
    }else{
       $response = ['status' => $isLoggedOut['valid'],'error' => $isLoggedOut['error']];
      return Response::json($response, 401);
    }
  }

  /**
   * Register the client
   * [POST] /api/{api_version}/auth/register
   * @return array
   */
  public function postRegister()
  {
    $isRegistered = $this->authGateway->register(Input::all());
    if($isRegistered['valid']){
      $response = ['status' => true, 'message' => 'Registered successfully', 'token' => $isRegistered['token']];
      return Response::json($response, 201);

    }else{
      $response = ['status' => false, 'message' => 'Registration failed', 'error' => $isRegistered['error']];
      return Response::json($response, 422);
    }
  }

}