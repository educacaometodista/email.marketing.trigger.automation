<?php

namespace App\Http\Controllers\Emkt;

use App\Acao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Emkt\ListaController;
use App\Http\Controllers\PlanilhaController;
use Illuminate\Support\Facades\Auth;
use App\Instituicao;
use App\Mensagem;
use App\TipoDeAcao;
use Session;

class AcaoController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }
    
    public function aknaAPI()
    {
        return new AknaController;
    }

    public function planilha()
    {
        return new PlanilhaController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.emkt.acoes.index', ['acoes' => Acao::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.emkt.acoes.create', ['instituicoes' => Instituicao::all(), 'tipos_de_acoes' => TipoDeAcao::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function uploadLists(Request $request)
    {
        /*$request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv,txt',
            'tipo_de_acao' => 'required|min:1|max:255|string',
            'date' => 'required|date'
        ]);*/

        if($request->hasFile('import_file'))
        {
            $importacao_de_listas = (new ListaController())->saveInSession($request->file('import_file'), date('d-m-Y', strtotime($request->input('date'))), $request->input('tipo_de_acao'));
            return redirect()->route('admin.acoes.selecionar-instituicoes');
            
        } else {
            return back();
        }

    }

    public function selecionar_instituicoes()
    {
        //if(Session::has('importacao-de-listas'))
        //{
            $importacao_de_listas = Session::get('importacao-de-listas');

            $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($importacao_de_listas) {
                    $query->where('tipo_de_acao_id', '=', $importacao_de_listas['tipo_de_acao']);
                }
            )->get();

            //Session::remove('importacao-de-listas');

            return view('admin.emkt.listas.selecionar-instituicoes', [
                'instituicoes' => $instituicoes,
                'listas' => $importacao_de_listas['arquivos']
                ]);

        //} else {
            return redirect()->route('admin.acoes.create');
        //}
    }


    public function store(Request $request)
    {

    }

}
