<?php

use Illuminate\Database\Seeder;

class MobilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($mobile_no = 1; $mobile_no <= 100; $mobile_no++) {
            \App\Mobile::create([
                'id' => $mobile_no,
                'slug' => str_random(9) . $mobile_no,
                'model' =>  'A' . $mobile_no,
                'brand' => 'Redmi',
                'sku' => str_random(9) . $mobile_no,
                'price' => mt_rand(1000*10, 10000*10) / 10,
                'processor' => 'GTF-' . str_random(3),
                'memory_capacity' => 4,
                'os' => 'Android',
                'os_version' => '9.0',
            ]);
        }
    }
}
