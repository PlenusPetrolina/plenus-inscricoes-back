<?php

namespace App\Http\Controllers;

use App\Repositories\SerieRepository;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    protected $serieRepository;

    public function __construct(SerieRepository $serieRepository)
    {
        $this->serieRepository = $serieRepository;
    }

    public function index()
    {
        return $this->serieRepository->all();
    }

}
