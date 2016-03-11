<?php namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\BaseApiController;
use App\Straightarrow\Modules\Auth\AuthGateway;
use App\Straightarrow\Modules\Auth\AuthValidation;
use App\Http\Requests\CreateReportsRequest as CreateReportsRequest;
use Response, Request;

use \App\User as User;
use \App\Reports as Reports;


class ReportsController extends BaseApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{



		$userId = parent::getUserId();
		$user = User::findOrFail($userId);
		$reports = $user->reports;

		if(count($reports) > 0){
			$bStatus = true;
			$sMessage = "Search success";
			$iStatusCode = 200;

		}else{
			$bStatus = false;
			$sMessage = "Please check search parameter";
			$iStatusCode = 204;
			$reports = [];
		}
	
		$aReturnData = array(
			'status' => $bStatus,
	    	'message' => $sMessage,
	    	'data' => array(
	    		'reports' => $reports
	    	)
	    );

		return Response::json($aReturnData,$iStatusCode);
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateReportsRequest $request)
	{

		$userId = parent::getUserId();

		$input = array(
			'user_id' => $userId,
			'location_id' => $request->get('location_id'),
			'brand_id' => $request->get('brand_id'),
			'area_range' => $request->get('area_range'),
			'name' => $request->get('name'),
			'search_group' => $request->get('search_group')
		);

		$bInserted = Reports::create($input);

		if($bInserted){
			$bStatus = true;
			$sMessage = "Saved successfully";
			$iStatusCode = 201;

		}else{
			$bStatus = false;
			$sMessage = "Error saving";
			$iStatusCode = 204;

		}
	
		$aReturnData = array(
			'status' => $bStatus,
	    	'message' => $sMessage
	    );

		return Response::json($aReturnData,$iStatusCode);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$reports = Reports::findOrFail($id);
		$bStatus = true;
		$iStatusCode = 200;



		$aReturnData = array(
			'status' => $bStatus,
			'data' => array(
				'reports' => $reports
			)
	    );

		return Response::json($aReturnData,$iStatusCode);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateReportsRequest $request, $id)
	{

		$userId = parent::getUserId();

		$input = array(
			'location_id' => $request->get('location_id'),
			'brand_id' => $request->get('brand_id'),
			'area_range' => $request->get('area_range'),
			'search_group' => $request->get('search_group')
		);


		$bUpdated = Reports::update($input);

		if($bUpdated){
			$bStatus = true;
			$sMessage = "Updated successfully";
			$iStatusCode = 201;

		}else{
			$bStatus = false;
			$sMessage = "Error updating";
			$iStatusCode = 500;

		}
	
		$aReturnData = array(
			'status' => $bStatus,
	    	'message' => $sMessage
	    );

		return Response::json($aReturnData,$iStatusCode);
		

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
