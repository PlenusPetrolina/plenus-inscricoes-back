<?php

namespace App\Repositories;

use App\Models\Serie;

class SerieRepository
{
    protected $model;

    public function __construct(Serie $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return response()->json($this->model->get(), 200);
    }


}
