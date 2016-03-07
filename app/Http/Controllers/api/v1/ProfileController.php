<?php namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\BaseApiController;
use App\Straightarrow\Modules\Profile\ProfileGateway;

use Illuminate\Http\Request;
use Response, Input;

class ProfileController extends BaseApiController {

  	protected $profileGateway;

	public function __construct(ProfileGateway $profileGateway)
	{
		$this->profileGateway = $profileGateway;
	}

	public function index()
	{

		$profile = $this->profileGateway->getProfile(parent::getUserId());


		if($profile['valid']) {
			return Response::json(['status'=>true,'profile'=>$profile['data']], 200);
		} 

		return Response::json(['status'=>false,'error'=>'Can\'t find profile information.'],401);

	}

	public function update()
	{
		$isProfile = $this->profileGateway->updateProfile(Input::all(), parent::getUserId());

		if($isProfile) 
		{
	      	$response = ['status' => true, 'message' => 'You have successfully updated your profile.'];
     		return Response::json($response,200);
		}

    	$response = ['status' => false, 'message' => 'Failed to update the profile. Please try again later.'];
    	return Response::json($response,200);
	}
	
}
