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
        'vagas'
    ];
    protected $casts = [
    'data' => 'datetime:d/m/Y',
];


}
