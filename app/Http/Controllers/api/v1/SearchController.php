<?php namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\User as User;
use App\Helpers\Helper;
use DB;
use Response;

class SearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 * access_token
	 * search_cat - (string) 'brands, groups, subgroups'
	 * search_specific (optional)- (string) - id, group_name
	 * 
	 * @return Response
	 */
	public function getSearch()
	{
		$sSearch = Input::get('search_category');

		if(null !== $sSearchSpecific = Input::get('search_specific')){

			if($aItems = DB::table($sSearch)->select($sSearchSpecific)->get()){
				$sMessage = "Search success";
				$iStatusCode = 200;
			}else{
				$sMessage = "Please check search parameter";
				$iStatusCode = 400;
			}

		}else{

			if(null !== $sSearch){
				$aItems = DB::table($sSearch)->get();
				$sMessage = "Search success";
				$iStatusCode = 200;
			}else{
				$sMessage = "Please check search parameter";
				$iStatusCode = 400;
			}

		}
		/*get only the values*/
		//list($keys, $values) = array_divide($aItems);

		
	    $aReturnData = array(
	    	'message' => $sMessage,
	    	'data' => $aItems
	    );

		return Response::json($aReturnData,$iStatusCode);

	}
	

	/**
	 * Display a listing of the resource.
	 *
	 * access_token
	 * item_id - (int) 1
	 * group_id - (string) '[1,2,5]'
	 * 
	 * 
	 * @return Response
	 */
	public function getSearchItems(){

		$iLocationId = Input::get('location_id');
		$iBrandId = Input::get('brand_id');
		$aAreaRange = json_decode(Input::get('area_range'));
		$aGroupIds = json_decode(Input::get('group_id'));

		$aItems = array();
		$aItemValues = array();
		$aResultAve = array();

		$aItem = DB::table('items')
			->select('id','location_id','brand_id','area')
			->where('location_id',$iLocationId)
			->where('brand_id',$iBrandId)
			->whereBetween('area',$aAreaRange)
			->get();

		foreach($aItem as $item){

			$aItemValue = DB::table('items_value')
			->select('items_value.id','items_value.item_id','groups.group_name','subgroups.subgroup_name','items_value.subgroup_id','items_value.value')
			->join('subgroups', 'subgroups.id', '=', 'items_value.subgroup_id')
			->join('groups', 'groups.id', '=', 'subgroups.group_id')
			->whereIn('groups.id',$aGroupIds)
			->where('item_id',$item->id)
			->get();

			array_push($aItemValues, $aItemValue);
		}


		$aFinalResultAve = self::getItemsAverage($aItemValues);

		$aReturnData = array(
	    	'status' => true,
	    	'data' => array(
	    			'search-list' => $aItemValues,
	    			'search-ave' => $aFinalResultAve
	    			
	    		)
	    );

		return $aReturnData;
		
	}

	public function getItemsAverage($array)
	{
		$aGroupIdWithUniqueCondition = array(15,16,17,18,19,20,21,22,23,24,25,26);
		return Helper::array_average_by_key($aGroupIdWithUniqueCondition,$array);
	}

	

}
