<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Kontak;
use Faker\Generator as Faker;

$factory->define(Kontak::class, function (Faker $faker) {
    return [
        'nama'=>$faker->name,
        'alamat'=>$faker->address,
        'telp'=>$faker->phoneNumber,
    ];
});
