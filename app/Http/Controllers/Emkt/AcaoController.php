<?php

namespace App\Http\Controllers\Emkt;

use App\Acao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Emkt\ListaController;
use App\Http\Controllers\PlanilhaController;
use App\Instituicao;
use App\Mensagem;
use Session;

class AcaoController extends Controller
{
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
        return view('admin.emkt.acoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acao = new Acao;
        $acao->titulo = $request->input('titulo');
        $acao->envio = $request->input('envio');
        $acao->destinatarios = $request->input('destinatarios');
        $acao->status = $request->input('status');
        $acao->mensagem_id = $request->input('mensagem_id');

        $acao->save();
        return redirect()->route('admin.acoes.edit', compact('acao'))
            ->with('success', 'Ação atualizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acao  $acao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.emkt.acao.show', ['acao' => Acao::findOrFail($id)]);
    }

    

    

    
}
