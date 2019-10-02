<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filtro;

class FiltroController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.emkt.filtros.index', ['filtros' => Filtro::all()]);
    }

    
}
