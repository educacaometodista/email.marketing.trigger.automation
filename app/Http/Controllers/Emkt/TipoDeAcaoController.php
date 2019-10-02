<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoDeAcao;

class TipoDeAcaoController extends Controller
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
        return view('admin.emtk.tipos-de-acoes.index', ['tipos_de_acoes' => TipoDeAcao::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emkt.tipos-de-acoes.create');
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
            'nome' => 'required|min:2|max:2|string|unique:tipos_de_acoes',
            'nome_de_exibicao' => 'required|min:2|max:255|string|unique:tipos_de_acoes',
        ]);

        $tipo_de_acao = new TipoDeAcao;
        $tipo_de_acao->nome = $request->input('nome');
        $tipo_de_acao->nome_de_exibicao = $request->input('nome_de_exibicao');
        $tipo_de_acao->save();
        
        return redirect()->route('admin.tipos-de-acoes.edit', compact('tipos_de_aco'))
            ->with('success', 'Tipo de Ação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.emkt.tipos-de-acoes.edit', ['tipo_de_acao' => TipoDeAcao::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|min:2|max:255|string',
            'nome_de_exibicao' => 'required|min:2|max:255|string',
        ]);

        $tipo_de_acao = TipoDeAcao::findOrFail($id)->update([
            'nome' => $request->nome,
            'nome_de_exibicao' => $request->nome_de_exibicao,
        ]);

        return redirect()->route('admin.tipos-de-acoes.edit', compact('tipos_de_aco'))
            ->with('success', 'Tipo de Ação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoDeAcao::findOrFail($id)->delete();

        return redirect()->route('admin.tipos-de-acoes.index')
            ->with('success', 'Tipo de Ação removida com sucesso!');
    }
}
