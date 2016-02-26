<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		//delete users table records
         DB::table('users')->delete();
         //insert some dummy records
         DB::table('users')->insert(array(
             array('name'=>'test','email'=>'test@test.com','password'=>Hash::make('password'))            
          ));

          $this->command->info('User table seeded!');


          //delete groups table records
         DB::table('groups')->delete();
         //insert some dummy records
         DB::table('groups')->insert(array(
             array('group_name'=>'Electrical'),
             array('group_name'=>'Gas'),
             array('group_name'=>'Air Conditioning'),
             array('group_name'=>'Ventilation'),
             array('group_name'=>'Plumbing'),
             array('group_name'=>'Fire Fighting'),
             array('group_name'=>'IT')
          ));

          $this->command->info('Groups table seeded!');



		//delete users table records
         DB::table('oauth_clients')->delete();
         //insert some dummy records
         DB::table('oauth_clients')->insert(array(
             array('id'=>'vindicoapp','secret'=>'password123','name'=>'vindico')            

          ));
  		$this->command->info('oauth_clients seeded!');


		// $this->call('UserTableSeeder');
	}

}
