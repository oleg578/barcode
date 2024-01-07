<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barcode;
use Faker\Generator as Faker;

$factory->define(Barcode::class, function (Faker $faker) {
    $prns = DB::table('printers')->select('name')->get();
    $prnnames = [];
    foreach ($prns as $pr) {
        $prnnames[] = $pr->name;
    }
    return [
        'code'=> $faker->isbn13(),
        'employee_pseudo' => $faker->randomElement([
            'Henry Morgan-9999999',
            'Jose Ross-7045',
            'Peter Pan-111',
            ]),
        'printer_name' => $faker->randomElement($prnnames),
    ];
});