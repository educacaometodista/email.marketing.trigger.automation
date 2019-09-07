<?php

namespace App\Http\Controllers;

use App\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.emkt.instituicoes.index', ['instituicoes' => Instituicao::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emkt.instituicoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instituicao = new Instituicao;
        $instituicao->nome = $request->input('nome');
        $instituicao->prefixo = $request->input('prefixo');
        $instituicao->codigo_da_empresa = $request->input('codigo_da_empresa');
        $instituicao->save();
        return redirect()->route('admin.instituicoes.edit', compact('instituicao'))
            ->with('success', 'Instituição atualizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.emkt.instituicoes.show', ['instituicao' => Instituicao::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.emkt.instituicoes.edit', ['instituicao' => Instituicao::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $instituicao = Instituicao::findOrFail($id)->update([
            'nome' => $request->nome,
            'codigo_da_empresa' => $request->codigo_da_empresa
        ]);

        return redirect()->route('admin.instituicoes.edit', compact('instituicao'))
            ->with('success', 'Instituição atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Instituicao::findOrFail($id)->delete();

        return redirect()->route('admin.instituicoes.index')
            ->with('success', 'Instituição removida com sucesso!');
    }
}
