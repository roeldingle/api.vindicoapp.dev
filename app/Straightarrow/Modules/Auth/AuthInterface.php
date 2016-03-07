<?php namespace App\Straightarrow\Modules\Auth;

interface AuthInterface
{
   /*
   *
   * @param integer $id
   * @param array $column
   * @return mixed
   *
   */



  public function find($id, array $columns);


  /**
   * Create a new resource of this model
   *
   * @param   array     $data
   * @return  boolean
   */

  public function register(array $data, $mode);


  public function findByFacebook($value,array $columns);
  public function findByTwitter($value,array $columns);
  public function findByEmail($value,array $columns);
  public function findByUsername($value,array $columns);
  public function create($data);
  public function createUser($data);
  public function update($data, $user_id);
  public function updatePassword($data, $user_id);

}
