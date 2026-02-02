<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SegmentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $segm = [
            ['nome' => 'Educação infantil'],
            ['nome' => 'Ensino Fundamental I'],
            ['nome' => 'Ensino Fundamental II'],
            ['nome' => 'Ensino Médio']

        ];

        foreach ($segm as $segmento) {
            \DB::table('segmentos')->insert([
                'nome' => $segmento['nome'],
            ]);
        }
    }
}
