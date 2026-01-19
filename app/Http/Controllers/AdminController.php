<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AdminRepository;

class AdminController extends Controller
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    public function userLogged(Request $request)
    {
        return $this->adminRepository->current($request);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        return $this->adminRepository->create($data);
    }
}
