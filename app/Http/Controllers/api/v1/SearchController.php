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
	public function getSearch()
	{

		$aItems = DB::table('items2')->select('brand')->orderBy('brand','asc')->groupBy('brand')->get();

 	    $aReturnData = array(
 	    		'message' => "See sample data",
 	    		'data' => $aItems 
 	    	);

		return Response::json($aReturnData);
	}

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

		$sTable = 'items2';
		$aItems2 = DB::table($sTable)->get();
		

		$aItem = array();
		$aItemMain = array();
		
		foreach ($aItems2 as $key=>$Items2){

			unset($Items2->id);
			unset($Items2->location);
			unset($Items2->brand);
			unset($Items2->area);

			
			//echo $Items2->col_16;

			foreach($Items2 as $Items3){

				array_push($aItem, $Items3);
			}

			//$iLocationId = DB::table('locations')->select('id')->where('location_name', $sLocation)->pluck('id');
			//$iBrandId = DB::table('brands')->select('id')->where('brand_name', $sBrand)->pluck('id');

			//$aPrepareItem = array(
				//	'location_id' => $iLocationId,
				//	'brand_id' => $iBrandId,
				//	'area' => str_replace(",", "", $Items2->area)
				//);

			//str_replace('"', 'in', $Items2->col_16)

			$aPrepareItem = array(
					'area' => str_replace("\"", "in", $Items2->col_16)
				);

			array_push($aItemMain, $aPrepareItem);

			
			

			//DB::table('items')->insert($aPrepareItem);
		}
		

		return $aItemMain;
	
	}

	

}
