<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscricao extends Model
{
    use SoftDeletes;

    protected $table = "inscricao";

    protected $fillable = [
        'evento_id',
        'user_id',
        'participantes',
        'status_id',
        'comprovante',
    ];
}
