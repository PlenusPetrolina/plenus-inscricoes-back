<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Herbet Medrado',
            'username' => 'herbet.medrado',
            'password' => Hash::make('01072015'),
            'perfil_id' => 3,
        ]);
    }
}
