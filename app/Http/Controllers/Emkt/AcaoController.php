<?php

namespace App\Http\Controllers\Emkt;

use App\Acao;
use Illuminate\Http\Request;

class AcaoController extends Controller
{
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acao  $acao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.emkt.acoes.edit', ['acao' => Acao::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acao  $acao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $acao = Acao::findOrFail($id)->update([
            'titulo' => $request->titulo,
            'envio' => $request->envio,
            'destinatarios' -> $request->destinatarios,
            'status' => $request->status,
            'mensagem_id' => $request->mensagem_id
        ]);

        return redirect()->route('admin.acoes.edit', compact('instituicao'))
            ->with('success', 'Ação atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acao  $acao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Acao::findOrFail($id)->delete();

        return redirect()->route('admin.acoes.index')
            ->with('success', 'Ação removida com sucesso!');
    }
}
