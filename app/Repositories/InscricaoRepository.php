<?php

namespace App\Repositories;

use App\Models\Inscricao;

class InscricaoRepository
{
    protected $model;

    public function __construct(Inscricao $model)
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
         return response()->json(['message' => 'Inscrição não encontrada'], 404);
        }
    }

    public function create(array $data)
    {
        $data = $this->model->create($data);
        if($data){
            return response()->json(['message' => 'Inscrição criada com sucesso'], 200);
        }else{
            return response()->json(['message' => 'Erro ao criar Inscrição'], 500);
        }
    }

    public function update(array $data, $id)
    {
        $inscricao = $this->model->find($id);
        if($inscricao){
            $inscricao->update($data);
            return response()->json(['data' => $inscricao, 'message' => 'Inscrição atualizada com sucesso'], 200);
        }
         return response()->json(['message' => 'Erro ao atualizar Inscrição'], 500);
    }
}
