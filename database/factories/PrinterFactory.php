<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Printer;
use Faker\Generator as Faker;

$factory->define(Printer::class, function (Faker $faker) {
    return [
        'name' => 'PRN-'.$faker->randomNumber($nbDigits = 5, $strict = false),
        'ip' => $faker->localIpv4(),
        'port' => $faker->numberBetween($min = 1000, $max = 65000),
        'zpl_prefix' => '^XA
        
        ^CF0,20
        ^FO10,10^FDBW Retail^FS
        ^FO10,30^GB185,1,3^FS
        
        ^JMA^FS
        ^FO10,50
        ^B2N,30,Y,N,N
        ^FD',
        'zpl_suffix' => '^FS

        ^XZ',
        'zpl_code' => '^XA
        
        ^CF0,20
        ^FO10,10^FDBW Retail^FS
        ^FO10,30^GB185,1,3^FS
        
        ^JMA^FS
        ^FO10,50
        ^B2N,30,Y,N,N
        ^FD
        
        ^FS

        ^XZ
        ',
    ];
});