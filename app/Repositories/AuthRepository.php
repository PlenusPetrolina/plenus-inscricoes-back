<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository
{
    protected $userRepository;
    protected $adminRepository;

    public function __construct(UserRepository $userRepository, AdminRepository $adminRepository)
    {
        $this->userRepository = $userRepository;
        $this->adminRepository = $adminRepository;
    }

    public function login($request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        }
        $user = $this->userRepository->byUser($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Login ou senha inválidos',
            ], 422);
        } else {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
               'user' => $user->with('perfil')->first()
            ]);

        }


    }

     public function loginAdmin($request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        }
        $user = $this->adminRepository->byAdmin($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Login ou senha inválidos',
            ], 422);
        } else {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user->with('perfil')->first()
            ]);

        }


    }



    public function logout($request)
    {
        $user = $request->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logout realizado com sucesso'], 200);
        }
    }
}

