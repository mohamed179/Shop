<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
