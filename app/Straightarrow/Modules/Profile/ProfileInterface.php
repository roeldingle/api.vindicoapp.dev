<?php namespace App\Straightarrow\Modules\Profile;

interface ProfileInterface
{

  /**
   * Find a specific data handled by the model
   *
   * @param integer $user_id
   * @param array $column
   * @return mixed
   *
   */

  public function find($user_id, array $columns);


  /**
   * Update a resource data handled by the model
   *
   * @param string $user_id
   * @param array $data
   * @return mixed
   *
   */
  public function updateProfile($user_id, array $data);

}
