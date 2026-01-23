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

         DB::table(table: 'users')->insert([
            'nome' => 'Responsavel',
            'email' => 'responsavel@teste.com',
            'whatsapp' => '21999999999',
            'password' => Hash::make('12345678'),
            'perfil_id' => 1,
        ]);
         DB::table(table: 'admins')->insert([
            'nome' => 'Coordenacao',
            'email' => 'coordenacao@teste.com',
            'password' => Hash::make('12345678'),
            'perfil_id' => 2,
        ]);
         DB::table(table: 'admins')->insert([
            'nome' => 'Financeiro',
            'email' => 'financeiro@teste.com',
            'password' => Hash::make('12345678'),
            'perfil_id' => 3,
        ]);
         DB::table(table: 'admins')->insert([
            'nome' => 'Administrador',
            'email' => 'administrador@teste.com',
            'password' => Hash::make('12345678'),
            'perfil_id' => 4,
        ]);
    }
}
