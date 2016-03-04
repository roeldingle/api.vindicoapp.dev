<?php namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use \App\User;
use App\Helpers\Helper as Helper;
use Response;
use LucaDegasperi\OAuth2Server\Authorizer;

class ReportsController extends Controller {

	public function index(){
		echo "test";
	}


	/*

	public function insertItems(){

		$sTable = 'items2';
		$aItems2 = DB::table($sTable)->select('brand','location','area')->get();

		$aItem = array();

		foreach ($aItems2 as $key=>$Items2){
			$sLocation = $Items2->location;
			$sBrand = $Items2->brand;

			$sBrand = str_replace("?", "'",$sBrand);

			$iLocationId = DB::table('locations')->select('id')->where('location_name', $sLocation)->pluck('id');
			$iBrandId = DB::table('brands')->select('id')->where('brand_name', $sBrand)->pluck('id');

			$aPrepareItem = array(
					'location_id' => $iLocationId,
					'brand_id' => $iBrandId,
					'area' => str_replace(",", "", $Items2->area)
				);

			
			array_push($aItem, $aPrepareItem);

			DB::table('items')->insert($aPrepareItem);
		}

		return $aItem;
	
	}

	public function insertItemsValues(){

		
		$sTable = 'item_value_source';
		$aItems2 = DB::table($sTable)->get();
		$aPreparedDataResult = array();
		$aPreparedData = array();
		$aItemSubgroupDataResult = array();
		$atest = array();

		/*get sub group*
		$aItemsSubGroup = DB::table('subgroups')->select('id','subgroup_name')->get();
		//foreach($aItemsSubGroup as $b){
			//array_push($aItemSubgroupDataResult,str_replace(" ","",$b->subgroup_name));
		//}

		foreach($aItems2 as $key1=>$aItem3){

			foreach($aItem3 as $key2=>$aItem4){

				foreach($aItemsSubGroup as $key3=>$val){

					if($key2 == $val->id){
						
						$aPreparedData['subgroup_id'] = $key3+1;
						$aPreparedData['value'] = $aItem4;

						array_push($aPreparedDataResult,array('item_id' => $aItem3->id,'subgroup_id' => $key3+1,'value' => $aItem4));

					}
				}

			}

		}


		//DB::table('item_value')->insert($aPrepareItem);
		
		
		
	
	}

	*/

	



}
