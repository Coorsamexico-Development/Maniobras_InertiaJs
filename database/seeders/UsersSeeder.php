<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sistemas',
            'ap_paterno' => 'Queretaro',
            'rol_id' => 1 ,// admin
            'email' => 'admin@coorsamexico.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123')
        ]);
    }
}
