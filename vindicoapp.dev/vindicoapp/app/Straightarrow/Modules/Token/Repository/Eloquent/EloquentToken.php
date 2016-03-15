<?php namespace App\Straightarrow\Modules\Token\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Straightarrow\Modules\Token\TokenInterface;

class EloquentToken implements TokenInterface
{
  /**
   * Eloquent model
   *
   * @var Illuminate\Database\Eloquent\Model
   */
  protected $token;

  public function __construct(Model $token)
  {
    $this->token = $token;
  }

  /**
   * Returns all collection data handled by the model
   *
   * @return mixed
   */
  public function all()
  {
    return $this->token->all();
  }

  /**
   * Returns all collection data handled by the model
   *
   * @return mixed
   */
  public function paginate($items = 5)
  {
    return $this->token->paginate($items);
  }

  /**
   * Find a specific data handled by the model
   *
   * @param integer $id
   * @param array $column
   * @return mixed
   *
   */

  public function find($id, array $columns = array('*'))
  {
    return $this->token->findOrFail($id, $columns);
  }

  /**
   * Create a new resource of this model
   *
   * @param   array     $data
   * @return  boolean
   */
  public function create($data)
  {
    $model = $this->token->create($data);

    return $model;
  }

  /**
   * Update a resource of this model
   *
   * @param   integer   $id
   * @param   array     $data
   * @return  collection
   */

  public function update($id, $data)
  {
    $model = $this->token->find($id);

    return $model->update($data);
  }

  /**
   * Delete an existing data in the model
   *
   * @param collection $model
   * @return mixed
   *
   */
  public function delete($model)
  {
    return ($model->delete()) ? true : false;
  }

  /**
   * Find a resource by api token
   * @param  string $token
   * @return int
   */
  public function findUserIdByToken($token)
  {
    return $this->token->whereApiToken($token)->first(['user_id']);
  }

  /**
   * Delete a resource by api token
   * @param  string $token
   * @return int
   */
  public function deleteByToken($token)
  {
    return $this->token->whereApiToken($token)->delete();
  }
}
