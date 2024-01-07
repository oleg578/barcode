<?php

use Illuminate\Database\Seeder;

class BarcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Barcode::class, 1000)->create();
    }
}