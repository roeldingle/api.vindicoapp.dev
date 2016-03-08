<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubgroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subgroups', function(Blueprint $table){
			$table->increments('id');
			$table->integer('group_id')->unsigned()->nullable();
			$table->string('subgroup_name');
		});

		Schema::table('subgroups', function($table) {
	       $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
	   });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subgroups');
	}

}
