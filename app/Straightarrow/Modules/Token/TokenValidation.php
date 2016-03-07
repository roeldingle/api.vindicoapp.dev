<?php namespace App\Straightarrow\Modules\Token;

use Illuminate\Validation\Factory as Validator;

class TokenValidation
{

  protected $validator;

  public function __construct(Validator $validator)
  {
    $this->validator = $validator;
  }

  static $insertRules = [
  ];

  static $updateRules = [
  ];

}