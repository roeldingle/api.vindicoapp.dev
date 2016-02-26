<?php namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\User as User;
use DB;
use Response;
use LucaDegasperi\OAuth2Server\Authorizer;

class SearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getSearch(Authorizer $authorizer)
	{

		$iUserId = $authorizer->getResourceOwnerId(); // the token user_id
 	    $aUser = User::find($iUserId);// get the user data from database
 	    $aUserData = User::all();

 	    $aReturnData = array(
 	    		'message' => "See sample data",
 	    		'data' => $aUser,
 	    		'all' =>  $aUserData 
 	    	);

		return Response::json($aReturnData);
	}

	

}
