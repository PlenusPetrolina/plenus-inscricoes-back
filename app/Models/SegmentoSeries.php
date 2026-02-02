<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SegmentoSeries extends Model
{
    protected $table = "segmento_series";

    protected $fillable = [
        'segmento_id',
        'serie_id'
    ];

    public function segmento(){
        return $this->belongsTo(Segmento::class);
    }
    public function series(){
        return $this->belongsTo(Serie::class);
    }
}
