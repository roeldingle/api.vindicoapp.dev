<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model {

	protected $fillable = [
		'user_id',
		'location_id',
		'brand_id',
		'area_range',
		'search_group',
		'name'
	];

	


	/*a report is owned by a user*/
	public function user()
	{
		return $this->belongsTo('App\User');

	}

}
