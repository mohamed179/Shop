<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('countries')->insert([
            ['name'=>'United States of America','alpha2'=>'US'],
            ['name'=>'Canada','alpha2'=>'CA'],
            ['name'=>'England','alpha2'=>'GB'],
            ['name'=>'France','alpha2'=>'FR'],
        ]);
    }
}
