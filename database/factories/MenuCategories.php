<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\MenuCategory;
use Faker\Generator as Faker;

$factory->define(MenuCategory::class, function (Faker $faker) {
    return [
       'menu_category'=>$faker->randomElement([
        'Mains',
        'Salads',
        'Wine',
        'Desert',
        'BreakFast'
       ])
    ];
});
