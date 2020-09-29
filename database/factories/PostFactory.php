<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\CropList;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'crop_name' => $faker->randomElement(CropList::all()->pluck('crop_name')),
        'crop_status' => $faker->randomElement($array = array ('Sprout','Seedling','Vegetative','Budding','Flowering','Ripening')),
        'crop_quantity' => $faker->numberBetween($min = 1000, $max = 2000),
        'crop_desc' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'crop_price' => $faker->numberBetween($min = 1000, $max = 2000),
        'startHarvestMonth' => $faker->numberBetween($min = 1, $max = 6),
        'startHarvestYear' => $faker->numberBetween($min = 2020, $max = 2020),
        'endHarvestMonth' => $faker->numberBetween($min = 7, $max = 12),
        'endHarvestYear' => $faker->numberBetween($min = 2021, $max = 2021),
        'startHarvestDay' => $faker->numberBetween($min = 1, $max = 30),
        'endHarvestDay' => $faker->numberBetween($min = 1, $max = 30),
        'production_cost' => $faker->numberBetween($min = 15000, $max = 30000),
        'crop_image' => 'no-image.jpg',
        'user_id' => $faker->randomElement(User::all()->where('register_as', '1')->pluck('id')),
    ];
});
