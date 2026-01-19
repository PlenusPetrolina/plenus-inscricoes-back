<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $perfis =[
        ['nome' => 'Responsavel'],
        ['nome' => 'Coordenador'],
        ['nome' => 'Financeiro'],
        ['nome' => 'Administrador'],

    ];

    foreach($perfis as $perfil){
        DB::table('perfil')->insert([
            'nome' => $perfil['nome'],
        ]);
    }

    }
}
