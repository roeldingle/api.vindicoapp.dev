<?php namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use \App\User;
use Response;
use LucaDegasperi\OAuth2Server\Authorizer;

class AuthController extends Controller {

	
	/**
	 * @param
	 * 	username - (test@test.com)
	 * 	password -> (password)
	 * 	grant_type -> (password)
	 * 	client_id -> issued when you created your app
	 * 	client_secret -> issued when you created your app
	 *
	 * @return Response
	 */
	public function login(Authorizer $authorizer)
	{

		$bLogin = !empty($authorizer->issueAccessToken()) ? true : false;

		if($bLogin){

			$aReturnData = array(
 	    		'message' => "Loggin successful",
 	    		'data' => $authorizer->issueAccessToken()
 	    	);

			$aReturn = Response::json($aReturnData,200);
		}else{ /*second level error catch, outh2 will validate first*/

			$aReturnData = array(
 	    		'message' => "Error login",
 	    		'data' => ""
 	    	);

			$aReturn = Response::json($aReturnData,500);
		}

		return $aReturn;
	}


	/**
	 * @param
	 * 	access_token
	 *
	 * @return Response
	 */
	public function logout(Authorizer $authorizer)
	{
		/*get access_token*/
		$sAccessToken = Input::get('access_token');

		/*delete access_token*/
		$bDeleted = DB::table('oauth_access_tokens')->where('id', $sAccessToken)->delete();

		if($bDeleted){

			$aReturnData = array(
 	    		'message' => "Logout successful",
 	    		'data' => ""
 	    	);

			$aReturn = Response::json($aReturnData,200);
		}else{

			$aReturnData = array(
 	    		'message' => "Error logout",
 	    		'data' => ""
 	    	);

			$aReturn = Response::json($aReturnData,500);
		}

		return $aReturn;

	}


	/**
	 * @param
	 * 	name 
	 * 	email
	 * 	password
	 *
	 * @return Response
	 */
	public function postRegister()
	{

		$user = new User();
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = \Illuminate\Support\Facades\Hash::make(Input::get('password'));

		$bRegistered = $user->save();

		if($bRegistered){

			$aReturnData = array(
 	    		'message' => "Registered successful",
 	    		'data' => Input::all()
 	    	);

			$aReturn = Response::json($aReturnData,201);
		}else{

			$aReturnData = array(
 	    		'message' => "Error register",
 	    		'data' => Input::all()
 	    	);

			$aReturn = Response::json($aReturnData,500);
		}

		return $aReturn;


	}

}
