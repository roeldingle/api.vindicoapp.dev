<?php namespace App\Straightarrow\Modules\Token;

use App\Straightarrow\Modules\Token\TokenInterface as TokenRepository;

class TokenGateway
{
  protected $tokenRepository;
  protected $validator;

  public function __construct(TokenRepository $tokenRepository)
  {
    $this->tokenRepository  = $tokenRepository;
  }
}
