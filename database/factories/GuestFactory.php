<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guest;
use Faker\Generator as Faker;

$factory->define(Guest::class, function (Faker $faker) {
    return [
        //
        'fullname' => $faker->name,
        'gender'=>$faker->randomElement($array = array ('l','p')),
        'age'=>$faker->numberBetween($min = 18, $max = 65),
        'education'=>$faker->randomElement($array = array ('sd','smp','sma','s1','s2','s3')),
        'agency'=> $faker->randomElement($array = array ('Dinas a','Dinas b',' Dinas c', 'Dinas d')),
        'agency_address'=>$faker->address,
        'handphone'=>$faker->numerify('08##########'),
        'email' => $faker->unique()->safeEmail,
    ];
});
