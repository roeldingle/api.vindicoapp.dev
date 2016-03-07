<?php namespace App\Straightarrow\Modules\Auth\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Straightarrow\Modules\Auth\AuthInterface;
use DB;


class EloquentAuth implements AuthInterface
{
  /**
  * Eloquent model
  *
  * @var Illuminate\Database\Eloquent\Model
  */
  protected $auth;

  public function __construct(Model $auth)
  {
    $this->auth = $auth;
  }

  public function find($id, array $columns = array('*'))
  {
    return $this->auth->findOrFail($id, $columns);
  }
/*
  public function findByUsername($username, array $columns = array('*'))
  {
    return $this->auth->whereUsername($username)->first($columns);
  }
*/


  public function register(array $data, $mode = 0)
  {
    if($mode == 0) {
      $model = $this->auth->create($data);
    } else {
      $model = $this->fieldValue->insert($data);
    }
    return $model;
  }


  public function findByFacebook($value,array $columns){
    return $this->user_meta->where('meta_key','facebook_id')->where('meta_value',$value)->first($columns);
  }

  public function findByTwitter($value,array $columns){


  }

  public function findByEmail($value,array $columns){
    return $this->auth->where('email',$value['email'])->first($columns);

  }

  public function findByUsername($value,array $columns){


  }

  
  public function create($data){
    $data['password'] = bcrypt($data['password']);

    $result = $this->auth->create($data);

    $facebook_fields = ['facebook_id', 'about_me', 'gender', 'first_name', 'middle_name', 'last_name', 'locale', 'timezone', 'date_of_birth', 'updated_time', 'status', 'longitude', 'latitude', 'location', 'age', 'photo'];

    foreach($facebook_fields as $field) {
      $_fields[] = [
        'user_id'     =>  $result->id,
        'meta_key'    =>  $field,
        'meta_value'  =>  isset($data[$field]) ? $data[$field] : ''
      ];
    }
    DB::table('user_meta')->insert($_fields);

    return $result;
  }

  public function createUser($data){
    $data['password'] = bcrypt($data['password']);

    $result = $this->auth->create($data);
    /*
    $meta_fields = ['about_me', 'gender', 'first_name', 'middle_name', 'last_name', 'locale', 'timezone', 'date_of_birth', 'updated_time', 'status', 'longitude', 'latitude', 'location', 'age', 'photo'];

    foreach($meta_fields as $field) {
      $_fields[] = [
        'user_id'     =>  $result->id,
        'meta_key'    =>  $field,
        'meta_value'  =>  isset($data[$field]) ? $data[$field] : ''
      ];
    }
    DB::table('user_meta')->insert($_fields);
    */
    
    //DB::table('users')->insert($result);

    return $result;
  }


   public function update($data, $user_id)
  {
      $model = $this->auth->where('id',$user_id)->update($data);
      return $model;
  }

  public function updatePassword($data,$user_id){
    $result = $this->auth->find($user_id)->update($data);
    return $result;
  }

}
