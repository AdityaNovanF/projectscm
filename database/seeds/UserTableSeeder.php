<?php

use \App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Kepala Perumahan',
            'role' => 'kper',
            'email' => 'kper@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Kepala Pembangunan',
            'role' => 'kpem',
            'email' => 'kpem@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Supplier',
            'role' => 'supplier',
            'email' => 'supplier@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
