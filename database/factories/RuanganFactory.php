<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ruangan;
use Faker\Generator as Faker;

$factory->define(Ruangan::class, function (Faker $faker) {
    $list_ruangan = [
			'RB-101',
			'RP-402',
			'RSI-504',
			'RUS-515',
			'RI-202',
			'RB-209',
			'RK-320',
			'RT-404',
			'RP-505',
			'RKH-123'
		];

    return [
        'id_jurusan' => $faker->unique()->numberBetween($min = 1, $max = 10),
        'nama_ruangan' => $faker->unique()->randomElement($list_ruangan)
    ];
});
