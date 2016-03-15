<?php namespace App\Straightarrow\Modules\Auth;

use Illuminate\Validation\Factory as Validator;

class AuthValidation
{

  protected $validator;

  public function __construct(Validator $validator)
  {
    $this->validator = $validator;
  }

  static $loginRules = [
    'username' => 'required',
    'password' => 'required'
  ];

  static $registrationRules = [
    'email'               => 'required|unique:vybfj_users,email',
    'password'            => ['required','min:6','max:32','Regex:/^\S*$/'],
    'confirm_password'    => ['min:6','max:32','same:password','Regex:/^\S*$/'],
    'first_name'          => ['required', 'Regex:/^[A-Za-z0-9\- ,\'\"\\.:\(\)]+$/'],
    'last_name'           => ['required', 'Regex:/^[A-Za-z0-9\- ,\'\"\\.:\(\)]+$/'],
    //'subscribe'           => 'boolean',
    'username'            => ['required', 'min:4','max:32','Regex:/^[A-Za-z_][A-Za-z0-9_]*$/'],
  ];

  public function isValidForLoginOrRegistration($input, $type = 'login')
  {
    $rules =  ($type == 'login') ? self::$loginRules : self::$registrationRules;
    $validator = $this->validator->make($input, $rules);
    return $this->check($validator);
  }

  public function check($validator)
  {

    if($validator->fails())
    {
      $this->errors = $validator->messages();
      return false;
    }

    return true;
  }

  public function errors()
  {
    return $this->errors;
  }



  public function isValidForRegister($input) {
  
    
    $validator = $this->validator->make($input,[
        'username'  =>  'required|min:6|unique:users|Regex:/^[A-Za-z0-9\- ,\'\"\\.:\(\)]+$/',
        'email'     =>  'required|unique:users|email',
        'password'  =>  'required|min:6|Regex:/^\S*$/',
        //'name'      =>  'required|min:6|Regex:/^[A-Za-z0-9\- ,\'\"\\.:\(\)]+$/',
      ]);

    return $this->check($validator);
  }

  public function isValidForLogin($input) {
    $validator = $this->validator->make($input,[
        'email'     =>  'required|email',
        'password'  =>  'required|Regex:/^\S*$/',
      ]);

    return $this->check($validator);
  }

  public function isValidEmail($input) {
    $validator = $this->validator->make($input,[
        'email'     =>  'required|email'
      ]);

    return $this->check($validator);
  }

}