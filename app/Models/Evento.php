<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'local',
        'data',
        'cidade',
        'gratuito',
        'valor',
        'resumo',
        'coordenacao',
        'areas',
        'admin_id',
        'vagas',
        'serie_id',
        'segmento_id',
    ];
    protected $casts = [
    'data' => 'datetime:d/m/Y',
];

public function segmento()
{
    return $this->belongsTo(Segmento::class);
}

public function serie()
{
    return $this->belongsTo(Serie::class);
}

}
