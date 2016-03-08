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

    /******************users table************************/
    //delete users table records
    DB::table('users')->delete();
    //insert some dummy records
    DB::table('users')->insert(array(
      array('name'=>'Test','email'=>'test@test.com','password'=>Hash::make('password'))            
    ));
    $this->command->info('User table seeded!');

    /******************groups table************************/
    //delete groups table records
    DB::table('groups')->delete();
    //insert some dummy records
    DB::table('groups')->insert(array(
      array('id' => '1', 'group_name'=>'Electrical'),
      array('id' => '2', 'group_name'=>'Gas'),
      array('id' => '3', 'group_name'=>'Air Conditioning'),
      array('id' => '4', 'group_name'=>'Ventilation'),
      array('id' => '5', 'group_name'=>'Plumbing'),
      array('id' => '6', 'group_name'=>'Fire Fighting'),
      array('id' => '7', 'group_name'=>'IT')
    ));
    $this->command->info('Groups table seeded!');


    /******************subgroups table************************/
    //delete subgroups table records
    DB::table('subgroups')->delete();
    //insert some dummy records
    DB::table('subgroups')->insert(array(

      array('id' => '1', 'group_id' => '1', 'subgroup_name'=>'Actual Power load (kw)'),
      array('id' => '2', 'group_id' => '1', 'subgroup_name'=>'Provided Power (kw) Total load'),

      array('id' => '3', 'group_id' => '2', 'subgroup_name'=>'Req LPG Demand (kg/hr)'),
      array('id' => '4', 'group_id' => '2', 'subgroup_name'=>'Provided LPG Supply (kg/hr)'),

      array('id' => '5', 'group_id' => '3', 'subgroup_name'=>'Using CHW'),
      array('id' => '6', 'group_id' => '3', 'subgroup_name'=>'Req Cooling Capacity (tonnage)'),
      array('id' => '7', 'group_id' => '3', 'subgroup_name'=>'Provide CHW/LS'),
      array('id' => '8', 'group_id' => '3', 'subgroup_name'=>'Provide Cooling capacity (tonnage)'),

      array('id' => '9', 'group_id' => '4', 'subgroup_name'=>'Fresh Air CHM'),
      array('id' => '10', 'group_id' => '4', 'subgroup_name'=>'Using Kitchen Extract (CFM)'),
      array('id' => '11', 'group_id' => '4', 'subgroup_name'=>'Provide Kitchen Extract (CFM)'),
      array('id' => '12', 'group_id' => '4', 'subgroup_name'=>'Req Makeup Air (CFM)'),
      array('id' => '13', 'group_id' => '4', 'subgroup_name'=>'Provide Makeup Air'),
      array('id' => '14', 'group_id' => '4', 'subgroup_name'=>'Smoke Extract'),

      array('id' => '15', 'group_id' => '5', 'subgroup_name'=>'Req Cold Water Stub out (no)'),
      array('id' => '16', 'group_id' => '5', 'subgroup_name'=>'Req Cold Water Stub out (size)'),
      array('id' => '17', 'group_id' => '5', 'subgroup_name'=>'Req Cold Water Stub out (bartype)'),
      array('id' => '18', 'group_id' => '5', 'subgroup_name'=>'Provided Cold Water Stub out (no)'),
      array('id' => '19', 'group_id' => '5', 'subgroup_name'=>'Provided Cold Water Stub out (size)'),
      array('id' => '20', 'group_id' => '5', 'subgroup_name'=>'Provided Cold Water Stub out (bartype)'),
      array('id' => '21', 'group_id' => '5', 'subgroup_name'=>'Req Drain waste (no)'),
      array('id' => '22', 'group_id' => '5', 'subgroup_name'=>'Req Drain waste (dia)'),
      array('id' => '23', 'group_id' => '5', 'subgroup_name'=>'Req Kitchen waste (no)'),
      array('id' => '24', 'group_id' => '5', 'subgroup_name'=>'Req Kitchen waste (dia)'),
      array('id' => '25', 'group_id' => '5', 'subgroup_name'=>'Req Soil waste (no)'),
      array('id' => '26', 'group_id' => '5', 'subgroup_name'=>'Req Soil waste (dia)'),

      array('id' => '27', 'group_id' => '6', 'subgroup_name'=>'Req below Ceiling stub out (mm dia)'),
      array('id' => '28', 'group_id' => '6', 'subgroup_name'=>'Provided below Ceiling stub out (mm dia)'),
      array('id' => '29', 'group_id' => '6', 'subgroup_name'=>'Req above Ceiling (void) sprinkler layout'),
      array('id' => '30', 'group_id' => '6', 'subgroup_name'=>'FHR Req'),

      array('id' => '31', 'group_id' => '7', 'subgroup_name'=>'Req Fiber Optic Lines with ONTC Box (no)')

    ));
    $this->command->info('Sub-Groups table seeded!');


    /******************brands table************************/
    //delete brand table records
    DB::table('brands')->delete();
    //insert some dummy records
    DB::table('brands')->insert(array(
      array('id' => '1', 'brand_name'=>'American Eagle Outfitters'),
      array('id' => '2', 'brand_name'=>'Asha\'s'),
      array('id' => '3', 'brand_name'=>'Babel'),
      array('id' => '4', 'brand_name'=>'Bath and Body Works'),
      array('id' => '5', 'brand_name'=>'Boots Pharmacy'),
      array('id' => '6', 'brand_name'=>'Burger King'),
      array('id' => '7', 'brand_name'=>'Claire\'s'),
      array('id' => '8', 'brand_name'=>'Debenhams'),
      array('id' => '9', 'brand_name'=>'Footlocker'),
      array('id' => '10', 'brand_name'=>'H&M'),
      array('id' => '11', 'brand_name'=>'Icing'),
      array('id' => '12', 'brand_name'=>'Joe Malone'),
      array('id' => '13', 'brand_name'=>'KFC'),
      array('id' => '14', 'brand_name'=>'MAC'),
      array('id' => '15', 'brand_name'=>'Mcdonalds'),
      array('id' => '16', 'brand_name'=>'Milano'),
      array('id' => '17', 'brand_name'=>'Miss Selfridge'),
      array('id' => '18', 'brand_name'=>'Mothercare'),
      array('id' => '19', 'brand_name'=>'Next'),
      array('id' => '20', 'brand_name'=>'Payless'),
      array('id' => '21', 'brand_name'=>'PF Changs'),
      array('id' => '22', 'brand_name'=>'Phase Eight'),
      array('id' => '23', 'brand_name'=>'Pinkberry'),
      array('id' => '24', 'brand_name'=>'PizzHut'),
      array('id' => '25', 'brand_name'=>'Pottery Barn'),
      array('id' => '26', 'brand_name'=>'Raising Cane'),
      array('id' => '27', 'brand_name'=>'River Island'),
      array('id' => '28', 'brand_name'=>'Shake Shack'),
      array('id' => '29', 'brand_name'=>'Starbucks'),
      array('id' => '30', 'brand_name'=>'Texas Roadhouse'),
      array('id' => '31', 'brand_name'=>'The Body Shop'),
      array('id' => '32', 'brand_name'=>'The Cheese Cake Factory'),
      array('id' => '33', 'brand_name'=>'Top Shop'),
      array('id' => '34', 'brand_name'=>'Victoria\'s Secret / PINK'),
      array('id' => '35', 'brand_name'=>'Vision Express')

    ));
    $this->command->info('Brands table seeded!');

    /******************locations table************************/
    //delete locations table records
    DB::table('locations')->delete();
    //insert some dummy records
    DB::table('locations')->insert(array(
      array('id' => '1', 'location_name'=>'Mall'),
      array('id' => '2', 'location_name'=>'Airport'),
      array('id' => '3', 'location_name'=>'Foodcourt')
    ));
    $this->command->info('Locations table seeded!');


	}

}
