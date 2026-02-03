<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
protected $fillable = [
    'matricula',
    'nome',
    'nome_responsavel',
    'cpf_responsavel',
];
}
