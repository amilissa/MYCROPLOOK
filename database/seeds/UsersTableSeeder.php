<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
	    	User::create([
	        'register_as' => '1',
            'first_name' => str_random(8),
            'middle_name' => str_random(8),
            'last_name' => str_random(8),
            'mobile_no' => '+639674485707',
            'email' => str_random(8) . '@gmail.com',
            'password' => bcrypt('123456'),
	        ]);
        }

        for ($i=0; $i < 3; $i++) { 
	    	User::create([
	        'register_as' => '2',
            'first_name' => str_random(8),
            'middle_name' => str_random(8),
            'last_name' => str_random(8),
            'mobile_no' => '+639674485707',
            'email' => str_random(8) . '@gmail.com',
            'password' => bcrypt('123456'),
	        ]);
        }
        
        DB::table('users')->insert([
            'register_as' => '0',
            'first_name' => 'Albert',
            'middle_name' => 'Tito',
            'last_name' => 'Einstein',
            'mobile_no' => '+639674485707',
            'email' => 'croplook_admin@gmail.com',
            'password' => bcrypt('password'),

        ]);

        DB::table('users')->insert([
            'register_as' => '0',
            'first_name' => 'Isaac',
            'middle_name' => 'Tito',
            'last_name' => 'Newton',
            'mobile_no' => '+639674485707',
            'email' => 'kufa_admin@gmail.com',
            'password' => bcrypt('password'),

        ]);

    }
}
