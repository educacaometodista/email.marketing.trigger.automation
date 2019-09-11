<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensagem;
use App\Instituicao;

class MensagemController extends Controller
{
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
        return view('admin.emkt.mensagens.create', ['instituicoes' => Instituicao::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $mensagem = new Mensagem;
        $mensagem->titulo = $request->input('titulo');
        $mensagem->url = $request->input('url_mensagem');
        $mensagem->assunto = $request->input('assunto');
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
        return view('admin.emkt.mensagens.edit', ['mensagem' => Mensagem::findOrFail($id), 'instituicoes' => Instituicao::all()]);
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
        $mensagem = Mensagem::findOrFail($id)->update([
            'titulo' => $request->titulo,
            'url' => $request->url_mensagem,
            'assunto' => $request->assunto,
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
