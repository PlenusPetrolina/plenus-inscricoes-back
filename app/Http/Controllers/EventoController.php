<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventoRepository;
use function Laravel\Prompts\search;

class EventoController extends Controller
{
    protected $eventoRepository;

    public function __construct(EventoRepository $eventoRepository)
    {
        $this->eventoRepository = $eventoRepository;
    }

    public function index(Request $request)
    {
        if ($request->query("search")) {
            return $this->eventoRepository->queryParams($request->query("search"));
        }
        return $this->eventoRepository->all();

    }

    public function show($id)
    {
        return $this->eventoRepository->find($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->eventoRepository->create($data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->eventoRepository->update($data, $id);
    }

}
