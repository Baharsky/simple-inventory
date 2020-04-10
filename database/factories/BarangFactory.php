<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    $list_barang = [
        	'AC',
        	'Proyektor',
        	'LCD',
        	'Parfum',
        	'Kursi'
        ];

    return [
        'id_ruangan' => $faker->unique()->randomElement([1,2,3,4,5,6,7,8,9,10]),
        'nama_barang' => $faker->randomElement($list_barang),
        'total' => $faker->numberBetween($min = 1, $max = 5),
        'broken' => $faker->numberBetween($min = 0, $max = 3),
        'created_by' => 1
    ];
});
