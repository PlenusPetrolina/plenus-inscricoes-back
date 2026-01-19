<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{
    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function byAdmin($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function current($request)
    {
        $user = $request->user();
        if($user){
            return response()->json($user, 200);
        }
        return response()->json(['message' => 'Não há Admin logado'], 404);
    }
    public function create(array $data)
    {
        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        $data = $this->model->create($data);
        if($data){
            return response()->json(['message' => 'Admin criado com sucesso'], 200);
        }else{
            return response()->json(['message' => 'Erro ao criar Admin'], 500);
        }
    }

}
