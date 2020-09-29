<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\DeliveryInfo;
use Faker\Generator as Faker;



    $factory->define(DeliveryInfo::class, function (Faker $faker) {
        return [

                'user_id' => ($user = factory('App\User', 1)->create())->first()->id,
                'del_address' => $faker->address,
                'del_brgy' => $faker->secondaryAddress,
                'del_city' => $faker->city,
                'del_province' => $faker->state,
                'del_zipcode' => $faker->postcode,
                'del_country' => $faker->country,
                'del_others' => $faker->streetAddress,
        ];
        
    });
    
    
    