<?php namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Request;
use App;

class BaseApiController extends Controller
{

  public function getUserId()
  {
    $apiToken = Request::header('X-Auth-Token');
    $tokenInterface = App::make('App\Straightarrow\Modules\Token\TokenInterface');
    $user = $tokenInterface->findUserIdByToken($apiToken);
    return $user['user_id'];
  }

}