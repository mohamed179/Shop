<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('LaravelShopSeeder');
        $this->call('BooksSeeder');
        $this->call('MobilesSeeder');
        $this->call('UsersSeeder');
        $this->call('CountriesSeeder');

        Model::reguard();
    }
}
