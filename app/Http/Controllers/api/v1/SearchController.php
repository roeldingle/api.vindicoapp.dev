<?php namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\User as User;
use DB;
use App\Helpers\Helper;
use Response;
//use LucaDegasperi\OAuth2Server\Authorizer;

class SearchController extends Controller {


	public function index()
	{
		
	}

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
	 * group_ids - (string) '[1,2,5]'
	 * 
	 * 
	 * @return Response
	 */
	public function getSearchItems(){


		$iLocationId = Input::get('location_id');
		$iBrandId = Input::get('brand_id');
		$aAreaRange = json_decode(Input::get('area'));
		$aGroupIds = json_decode(Input::get('group_ids'));

		$aItems = array();
		$aItemValues = array();
		$aResultAve = array();



		//$aGroupIds = explode(",", Input::get('group_ids'));//[1,2,3];// Input::get('group_ids');
		$aItem = DB::table('items')
			->select('id','location_id','brand_id','area')
			->where('location_id',$iLocationId)
			->where('brand_id',$iBrandId)
			->whereBetween('area',$aAreaRange)
			->get();


		foreach($aItem as $item){

			$aItemValue = DB::table('items_value')
			->select('groups.id','groups.group_name','subgroups.subgroup_name','items_value.subgroup_id','items_value.value')
			->join('subgroups', 'subgroups.id', '=', 'items_value.subgroup_id')
			->join('groups', 'groups.id', '=', 'subgroups.group_id')
			->whereIn('groups.id',$aGroupIds)
			->where('item_id',$item->id)
			->get();

			array_push($aItemValues, $aItemValue);
		}


		$aFinalResultAve = self::getItemsAverage($aItemValues);

		$aReturnData = array(
	    	'message' => "yes",
	    	'data' => array(
	    			'search-list-count' => count($aItemValues),
	    			'search-ave' => $aFinalResultAve,
	    			'search-list' => $aItemValues
	    		)
	    );


		return $aReturnData;
		
	}

	public function getItemsAverage($array){

		//dd($array);
		return self::array_average_by_key($array);
	}


	 public function array_average_by_key( $arr )
	{
	    $sums = array();
	    $counts = array();
	    foreach( $arr as $k => &$v )
	    {

			foreach( $v as $sub_k => $sub_v )
	        {
	            if( !array_key_exists( $sub_k, $counts ) )
	            {
	                $counts[$sub_k] = 0;
	                $sums[$sub_k]   = 0;
	            }

	            
	            $sub_value = $sub_v->value;
	            

	            $counts[$sub_k]++;
	            $sums[$sub_k]  += (float) $sub_value;

	        }
	        
	    }
	    $avg = array();

	    foreach( $sums as $k => $v )
	    {
	        $avg[$k] = $v / $counts[$k];
	    }
	    return $avg;
	}


	


	

}
