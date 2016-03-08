<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsValueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items_value', function(Blueprint $table){
			$table->increments('id');
			$table->integer('item_id')->unsigned()->nullable();
			$table->integer('subgroup_id');
			$table->string('value');
			
		});

		Schema::table('items_value', function($table) {
	       $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
	   });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items_value');
	}

}
