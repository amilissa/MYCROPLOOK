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
