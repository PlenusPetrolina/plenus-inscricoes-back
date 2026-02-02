<?php

namespace App\Http\Controllers;

use App\Repositories\SegmentoRepository;
use Illuminate\Http\Request;

class SegmentoController extends Controller
{
    protected $segmentoRepository;

    public function __construct(SegmentoRepository $segmentoRepository)
    {
        $this->segmentoRepository = $segmentoRepository;
    }

    public function index()
    {
        return $this->segmentoRepository->all();
    }

}
