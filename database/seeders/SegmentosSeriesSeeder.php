<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SegmentosSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relation = [
            ['segmento' => 1, 'serie' => 1],
            ['segmento' => 1, 'serie' => 2],
            ['segmento' => 1, 'serie' => 3],
            ['segmento' => 1, 'serie' => 4],
            ['segmento' => 2, 'serie' => 5],
            ['segmento' => 2, 'serie' => 6],
            ['segmento' => 2, 'serie' => 7],
            ['segmento' => 2, 'serie' => 8],
            ['segmento' => 2, 'serie' => 9],
            ['segmento' => 3, 'serie' => 10],
            ['segmento' => 3, 'serie' => 11],
            ['segmento' => 3, 'serie' => 12],
            ['segmento' => 3, 'serie' => 13],
            ['segmento' => 4, 'serie' => 14],
            ['segmento' => 4, 'serie' => 15],
            ['segmento' => 4, 'serie' => 16],

        ];

        foreach ($relation as $serie) {
            \DB::table('segmento_series')->insert([
                'segmento_id' => $serie['segmento'],
                'serie_id' => $serie['serie'],
            ]);
        }
    }
}
