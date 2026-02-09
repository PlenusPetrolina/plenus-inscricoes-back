<?php

namespace App\Repositories;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected $model;
    protected $alunoModel;

    public function __construct(User $model, Aluno $alunoModel)
    {
        $this->model = $model;
        $this->alunoModel = $alunoModel;
    }

    public function byUser($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function current($request)
    {
        $user = $request->user();
        if ($user) {
            return response()->json($user, 200);
        }
        return response()->json(['message' => 'Não há usuário logado'], 404);
    }
    public function create(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $data = $this->model->create($data);
        if ($data) {
            return response()->json(['message' => 'Usuário criado com sucesso'], 200);
        } else {
            return response()->json(['message' => 'Erro ao criar usuário'], 500);
        }
    }

    public function findByCpf($cpf)
    {
        $data = [];
        if ($cpf) {
            $query = $this->alunoModel->where('cpf_responsavel', $cpf)->get();
            foreach ($query as $key => $value) {
                if ($key === 0) {
                    $data['nome_responsavel'] = $value->nome_responsavel;
                    $data['cpf'] = $value->cpf_responsavel;
                }

                $data['filhos'][] = [
                    'matricula' => $value->matricula,
                    'nome_filho' => $value->nome,
                ];
            }
            return response()->json(['data' => $data], 200);
        }
    }



}
