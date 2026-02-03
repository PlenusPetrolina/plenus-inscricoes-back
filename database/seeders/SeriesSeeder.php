<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $series = [
            ['nome' => 'Maternal 1'],
            ['nome' => 'Maternal 2'],
            ['nome' => 'Pré Escolar 1'],
            ['nome' => 'Pré Escolar 2'],
            ['nome' => '1º Ano'],
            ['nome' => '2º Ano'],
            ['nome' => '3º Ano'],
            ['nome' => '4º Ano'],
            ['nome' => '5º Ano'],
            ['nome' => '6º Ano'],
            ['nome' => '7º Ano'],
            ['nome' => '8º Ano'],
            ['nome' => '9º Ano'],
            ['nome' => '1ª Série EM'],
            ['nome' => '2ª Série EM'],
            ['nome' => '3ª Série EM'],

        ];

        foreach ($series as $serie) {
            \DB::table('series')->insert([
                'nome' => $serie['nome'],
            ]);
        }
    }
}
