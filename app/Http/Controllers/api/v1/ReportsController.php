<?php namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use \App\User as User;
use App\Helpers\Helper as Helper;
use Response;
use LucaDegasperi\OAuth2Server\Authorizer;

class ReportsController extends Controller {

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param 
	 * access_token (string) -> random string as authentication
	 * brand_id
	 * location_id
	 * area_range_id
	 * group_ids (array) -> array of group fields ids searched
	 *
	 *
	 *
	 * @return Response
	 */
	public function getSearch()
	{

		/*set req variables*/
		$iBrandId = Input::get('brand_id');
		$iLocationId = Input::get('location_id');
		$iAreaId = Input::get('area_range_id');
		$aSearchGroup = Input::get('group_ids');

		/*check if req var are set*/
		$bBrandId = Helper::checkDataExist($iBrandId);
		$bLocationId = Helper::checkDataExist($iLocationId);
		$bAreaId = Helper::checkDataExist($iAreaId);
		$bSearchGroup = Helper::checkDataExist($aSearchGroup);


		if($bBrandId && $bLocationId && $bAreaId && $bSearchGroup){
			
			$aFieldId = explode(',',$aSearchGroup);

			if(is_array($aFieldId)){

				$aReturnData = array(
	 	    		'message' => "array",
	 	    		"data" => array(
	 	    				"search-list" => User::find($aFieldId),
	 	    				"search-ave" => ""
	 	    			)
	 	    	);

				$aReturn = Response::json($aReturnData,200);
			}else{

				$aReturnData = array(
	 	    		'message' => "not array"
	 	    	);

				$aReturn = Response::json($aReturnData,204);
			}

		}else{
			$aReturnData = array(
 	    		'message' => "not array"
 	    	);

			$aReturn = Response::json($aReturnData,400);
		}

		return $aReturn;
	}



}
