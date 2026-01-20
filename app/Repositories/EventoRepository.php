<?php

namespace App\Repositories;

use App\Models\Evento;

class EventoRepository
{
    protected $model;

    public function __construct(Evento $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return response()->json($this->model->all(), 200);
    }

    public function find($id)
    {
        $data =  $this->model->find($id);
        if($data){
         return response()->json($data, 200);
        }else{
         return response()->json(['message' => 'Evento não encontrado'], 404);
        }
    }

    public function create(array $data)
    {
        $data = $this->model->create($data);
        if($data){
            return response()->json(['message' => 'Evento criado com sucesso'], 200);
        }else{
            return response()->json(['message' => 'Erro ao criar Evento'], 500);
        }
    }

    public function update(array $data, $id)
    {
        $evento = $this->model->find($id);
        if($evento){
            $evento->update($data);
            return response()->json(['data' => $evento, 'message' => 'Evento atualizado com sucesso'], 200);
        }
         return response()->json(['message' => 'Erro ao atualizar Evento'], 500);
    }
}
