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
	 * access_token
	 * search_cat - (string) 'brands, groups, subgroups'
	 * 
	 * @return Response
	 */
	public function getSearch()
	{

		$sSearch = Input::get('search_cat');
		$aItems = DB::table($sSearch)->get();

 	    //$aReturnData = array(
 	    	//	'message' => "See sample data",
 	    	//	'data' => $aItems 
 	    	//);

		//return Response::json($aReturnData);
		return $aItems;
	}

	

	/**
	 * Display a listing of the resource.
	 *
	 * access_token
	 * item_id - (int) 1
	 * group_ids - (string) '[1,2,5]'
	 * 
	 * 
	 * @return Response
	 */
	public function getSearchItems(){


		$iTemId = Input::get('item_id');
		$aGroupIds = explode(",", Input::get('group_ids'));//[1,2,3];// Input::get('group_ids');
		$aItem = DB::table('items')
			->select('id','location_id','brand_id','area')
			->where('id',$iTemId)
			->get();

		$aItemValues = DB::table('item_value')
			->select('groups.group_name','subgroups.subgroup_name','item_value.value')
			->join('subgroups', 'subgroups.id', '=', 'item_value.subgroup_id')
			->join('groups', 'groups.id', '=', 'subgroups.group_id')
			->whereIn('groups.id',$aGroupIds)
			->where('item_id',$iTemId)
			->get();

		array_push($aItem, $aItemValues);

		return $aItem;
		
	}

	

}
