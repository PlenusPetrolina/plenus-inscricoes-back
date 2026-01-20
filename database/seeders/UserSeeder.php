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
        DB::table('admins')->insert([
            'nome' => 'Herbet Medrado',
            'email' => 'herbetjr@gmail.com',
            'password' => Hash::make('01072015'),
            'perfil_id' => 4,
        ]);

         DB::table(table: 'users')->insert([
            'nome' => 'Herbet Medrado',
            'email' => 'herbetjr@gmail.com',
            'whatsapp' => '21999999999',
            'password' => Hash::make('01072015'),
            'perfil_id' => 1,
        ]);
    }
}
