<?php namespace App\Straightarrow\Modules\Profile;

use App\Straightarrow\Modules\Profile\ProfileInterface as ProfileRepository;
/*use App\Straightarrow\Modules\ProfileFeeds\ProfileFeedsInterface as ProfileFeedRepository;*/
use DB;
use Hash;
use Event;
use Config;
use Carbon\Carbon;

class ProfileGateway
{
  protected $repository;
  /*protected $profileFeedRepository;*/

  public function __construct(ProfileRepository $repository/*, ProfileFeedRepository $profileFeedRepository*/)
  {

    $this->repository             = $repository;


    /*$this->profileFeedRepository  = $profileFeedRepository;*/
  }

  public function getProfile($user_id)
  {


    $user = $this->repository->find($user_id);

    if( !$user || $user == null ){
      return ['valid'=>false, 'message'=>'User does not exists'];
    }

    $facebook_fields = ['facebook_id', 'about_me', 'gender', 'first_name', 'middle_name', 'last_name', 'locale', 'timezone', 'date_of_birth', 'updated_time', 'status', 'longitude', 'latitude', 'location', 'age', 'photo'];

    $profile = [
      'id'          => $user->toArray()['id'],
      'email'       => $user->toArray()['email'],
    ];
    $user_meta = $user->user_meta;


    foreach($facebook_fields as $field){
      $meta = $user_meta->where('meta_key',$field)->first();

      $profile[$field] = ( $meta ? $meta->toArray()['meta_value'] : '' );
    }

    return ['valid'=>true,'data'=>$profile];/*
    dd($this->repository->find($user_id)->first());
  	$user = $this->repository->find($user_id, ['*']);

    return $user;*/
  }

  public function updateProfile($data, $user_id)
  {
    return $this->repository->updateProfile($user_id, $data);

  }
}