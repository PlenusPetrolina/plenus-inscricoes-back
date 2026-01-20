<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InscricaoRepository;

class InscricaoController extends Controller
{
    protected $inscricaoRepository;

    public function __construct(InscricaoRepository $inscricaoRepository)
    {
        $this->inscricaoRepository = $inscricaoRepository;
    }

    public function index()
    {
        return $this->inscricaoRepository->all();
    }
    public function store(Request $request)
    {
        return $this->inscricaoRepository->create($request->all());
    }
    public function show($id)
    {
        return $this->inscricaoRepository->find($id);
    }
    public function update(Request $request, $id)
    {
        return $this->inscricaoRepository->update($request->all(), $id);
    }
}
