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

        DB::table('croplist')->insert([
            'crop_name' => 'Banana',
            'default_cropImage' => 'banana.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Bell Pepper',
            'default_cropImage' => 'bell pepper.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Cabbage',
            'default_cropImage' => 'cabbage.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Carrot',
            'default_cropImage' => 'carrot.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Chayote',
            'default_cropImage' => 'chayote.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Corn',
            'default_cropImage' => 'corn.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Eggplant',
            'default_cropImage' => 'eggplant.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Garlic',
            'default_cropImage' => 'garlic.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Okra',
            'default_cropImage' => 'okra.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Onion',
            'default_cropImage' => 'onion.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Potato',
            'default_cropImage' => 'potato.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Raddish',
            'default_cropImage' => 'raddish.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Spinach',
            'default_cropImage' => 'spinach.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Spring Beans',
            'default_cropImage' => 'spring beans.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Squash',
            'default_cropImage' => 'Squash.jpg',

        ]);
        DB::table('croplist')->insert([
            'crop_name' => 'Tomato',
            'default_cropImage' => 'tomato.jpg',

        ]);

    }
}
