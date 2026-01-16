<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscricaoStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusInscricao =[
        ['nome' => 'Pendente'],
        ['nome' => 'Confirmada'],
        ['nome' => 'Cancelada'],

    ];

    foreach($statusInscricao as $status){
        DB::table('inscricao_status')->insert([
            'nome' => $status['nome'],
        ]);
    }
    }
}
