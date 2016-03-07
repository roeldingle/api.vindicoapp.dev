<?php namespace App\Straightarrow\Modules\Profile\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Straightarrow\Modules\Profile\ProfileInterface;
use DB;

class EloquentProfile implements ProfileInterface
{
  /**
   * Eloquent model
   *
   * @var Illuminate\Database\Eloquent\Model
   */
  protected $user;

  public function __construct(Model $user, Model $usermeta)
  {
    $this->user = $user;
    $this->usermeta = $usermeta;
  }

  public function find($id, array $columns = array('*'))
  {
    //return $this->usermeta->whereUserId($id)->first($columns);
    return $this->user->whereId($id)->first($columns);
  }

  public function updateProfile($user_id, array $data)
  {
    return $this->usermeta->whereUserId($user_id)->update($data);
  }
}
