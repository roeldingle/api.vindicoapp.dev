<?php namespace App\Straightarrow\Modules\Token;

interface TokenInterface
{
  /**
   * Returns all collection data handled by the model
   *
   * @return mixed
   */
  public function all();

  /**
   * Returns all collection data handled by the model
   *
   * @return mixed
   */
  public function paginate($items = 5);

  /**
   * Find a specific data handled by the model
   *
   * @param integer $id
   * @param array $column
   * @return mixed
   *
   */

  public function find($id, array $columns = array('*'));

  /**
   * Create a new resource of this model
   *
   * @param   array     $data
   * @return  boolean
   */
  public function create($data);

  /**
   * Update a resource of this model
   *
   * @param   integer   $id
   * @param   array     $data
   * @return  collection
   */

  public function update($id, $data);

  /**
   * Delete an existing data in the model
   *
   * @param collection $model
   * @return mixed
   *
   */
  public function delete($model);

  /**
   * Find a resource by api token
   * @param  string $token
   * @return int
   */
  public function findUserIdByToken($token);

  /**
   * Delete a resource by api token
   * @param  string $token
   * @return int
   */
  public function deleteByToken($token);
}