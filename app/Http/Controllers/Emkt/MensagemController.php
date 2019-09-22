<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensagem;
use App\Instituicao;

class MensagemController extends Controller
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
        
        return view('admin.emkt.mensagens.index', ['mensagens' => Mensagem::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_de_acoes = [ 
            'Ausentes' => 'Ausentes',
            'Inscritos Parciais' => 'Inscritos Parciais',
            'Inscritos Parciais Ead' => 'Inscritos Parciais Ead',
            'Lembrete de Prova' => 'Lembrete de Prova',
            'Aprovados Não Matriculados' => 'Aprovados Não Matriculados'
        ];
        
        return view('admin.emkt.mensagens.create', [
            'instituicoes' => Instituicao::all(),
            'tipos_de_acoes' => $tipos_de_acoes ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:2|max:30|string|unique:mensagens',
            'url_da_imagem' => 'required|min:10|max:10000|string',
            'assunto' => 'required|min:2|max:150|string',
            'tipo_de_acao' => 'required|min:2|max:30|string',
            'instituicao' => 'required|min:1|max:40|string'
        ]);
        
        $mensagem = new Mensagem;
        $mensagem->titulo = $request->input('titulo');
        $mensagem->url = $request->input('url_da_imagem');
        $mensagem->assunto = $request->input('assunto');
        $mensagem->tipo_de_acao = $request->input('tipo_de_acao');
        $mensagem->instituicao_id = $request->input('instituicao');
        $mensagem->save();
        return redirect()->route('admin.mensagens.edit', compact('mensagem'))
            ->with('success', 'Mensagem criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.emkt.mensagens.show', ['mensagem' => Mensagem::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos_de_acoes = [ 
            'Ausentes' => 'Ausentes',
            'Inscritos Parciais' => 'Inscritos Parciais',
            'Inscritos Parciais a Distancia' => 'Inscritos Parciais Ead',
            'Lembrete de Prova' => 'Lembrete de Prova',
            'Aprovados Não Matriculados' => 'Aprovados Não Matriculados'
        ];

        return view('admin.emkt.mensagens.edit', [
            'mensagem' => Mensagem::findOrFail($id),
            'instituicoes' => Instituicao::all(), 
            'tipos_de_acoes' => $tipos_de_acoes ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|min:2|max:30|string',
            'url_da_imagem' => 'required|min:10|max:10000|string',
            'assunto' => 'required|min:2|max:150|string',
            'tipo_de_acao' => 'required|min:2|max:30|string',
            'instituicao' => 'required|min:1|max:40|string'
        ]);
        
        $mensagem = Mensagem::findOrFail($id)->update([
            'titulo' => $request->titulo,
            'url' => $request->url_da_imagem,
            'assunto' => $request->assunto,
            'tipo_de_acao' => $request->tipo_de_acao,
            'instituicao_id' => $request->instituicao
        ]);

        return redirect()->route('admin.mensagens.edit', compact('mensagem'))
            ->with('success', 'Mensagem atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mensagem::findOrFail($id)->delete();

        return redirect()->route('admin.mensagens.index')
            ->with('success', 'Mensagem removida com sucesso!');
    }
}
