<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin KSD',
                'email' => 'admin.KSD'.'@gmail.com',
                'password' => Hash::make('ksd082021'),
            ],
            // [
            //     'name' => 'Konten.KSD',
            //     'email' => 'konten.KSD'.'@gmail.com',
            //     'password' => Hash::make('kontenksd082021'),
            // ]
        );
    }
}
