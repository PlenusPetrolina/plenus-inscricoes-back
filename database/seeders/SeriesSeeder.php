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
           ['nome' => '1º Ano'],
            ['nome' => '2º Ano'],
            ['nome' => '3º Ano'],
            ['nome'=> '4º Ano'],
            ['nome'=> '5º Ano'],
            ['nome'=> '6º Ano'],
            ['nome'=> '7º Ano'],
            ['nome'=> '8º Ano'],
            ['nome'=> '9º Ano'],

        ];

        foreach ($series as $serie) {
            \DB::table('series')->insert([
                'nome' => $serie['nome'],
            ]);
        }
    }
}
