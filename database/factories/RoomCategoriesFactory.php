<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Room_category;
use Faker\Generator as Faker;

$factory->define(Room_category::class, function (Faker $faker) {
    return [
        'room_category' => $faker->randomElement([
            'Single Delux Room',
            'Classic Room',
            'HollyWood Twin room',
            'HollyWood Twin room',
            'Double Delux Room',
            'Standard Single Room',
            'Double Delux Room',
            'HollyWood Twin room',
            'Preminu Room'
        ]),
        'no_room' => $faker->numberBetween(1, 10)
    ];
});
