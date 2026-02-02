<?php

namespace App\Repositories;

use App\Models\Segmento;

class SegmentoRepository
{
    protected $model;

    public function __construct(Segmento $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return response()->json($this->model->with('series')->get(), 200);
    }


}
