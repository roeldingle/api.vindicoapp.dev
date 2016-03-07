<?php namespace App\Straightarrow\Middleware\Api;

use DB;
use Input;
use Response;
use Request;
use Config;
use App;
use Carbon\Carbon;
use DateTime;
use Closure;

class Access
{
  public function handle($request, Closure $next)
  {
    $apiToken       = Request::header('X-Auth-Token');
    $userToken      = DB::table('tokens')->where('api_token', $apiToken)->first();

    //check if the token exists else check if it is expired or not
    if(count($userToken) == 0){
      $response = ['valid' => 'false', 'message' => 'API Token is invalid or doesn\'t exist'];
      return Response::json($response,401);
    }else{
      //create an instance of dateTime
      $expirationDate = Carbon::instance(new DateTime($userToken->expired_at));
      //if the "current date" is GTE(Greater Than or Equal) to the "expiration date"
      //return true else false
      $isExpired = (Carbon::now()->gte($expirationDate)) ? true : false;
      if($isExpired){
        $response = ['valid' => 'false', 'message' => 'Expired API Token'];
        return Response::json($response,401);
      }
    }
    return $next($request);
  }
}