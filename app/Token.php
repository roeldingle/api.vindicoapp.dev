<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model {


	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'tokens';


	/**
	* The primary key used by the model.
	*
	* @var integer
	*/
	protected $primaryKey = 'id';

	/**
	* The fields that are allowed for mass assignment
	* @var array
	*/
	protected $fillable = ['user_id', 'api_token', 'expired_at'];

	/**
	* One to Many Relationship
	* Model: User
	*/
	public function users()
	{
		return $this->belongsTo('App\User');
	}
}
