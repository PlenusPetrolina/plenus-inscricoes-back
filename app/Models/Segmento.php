<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function series()
    {
        return $this->belongsToMany(Serie::class, 'segmento_series', 'segmento_id', 'serie_id');

    }
}
