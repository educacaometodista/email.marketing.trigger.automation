<?php

namespace App\Http\Controllers\Emkt;

use App\Instituicao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstituicaoController extends Controller
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
        $request->validate([
            'nome' => 'required|min:2|max:30|string|unique:instituicoes',
            'prefixo' => 'required|min:2|max:16/string|unique:instituicoes',
            'nome_do_remetente' => 'required|min:2|max:30',
            'email_do_remetente' => 'required|min:4|max:40|email',
            'email_de_retorno' => 'required|min:4|max:40|email',
            'codigo_da_empresa' => 'required|min:4|max:5|unique:instituicoes'
        ]);

        $instituicao = new Instituicao;
        $instituicao->nome = $request->input('nome');
        $instituicao->prefixo = $request->input('prefixo');
        $instituicao->nome_do_remetente = $request->input('nome_do_remetente');
        $instituicao->email_do_rementente = $request->input('email_do_remetente');
        $instituicao->email_de_retorno = $request->input('email_de_retono');

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
        $request->validate([
            'nome' => 'required|min:2|max:30|string|unique:instituicoes',
            'prefixo' => 'required|min:2|max:16|string|unique:instituicoes',
            'nome_do_remetente' => 'required|min:2|max:30',
            'email_do_remetente' => 'required|min:4|max:40|email',
            'email_de_retorno' => 'required|min:4|max:40|email',
            'codigo_da_empresa' => 'required|min:4|max:5|unique:instituicoes'
        ]);

        $instituicao = Instituicao::findOrFail($id)->update([
            'nome' => $request->nome,
            'prefixo' => $request->prefixo,
            'codigo_da_empresa' => $request->codigo_da_empresa,
            'nome_do_remetente' => $request->nome_do_remetente,
            'email_do_remetente' => $request->email_do_remetente,
            'email_de_retorno' => $request->emauil_de_retorno
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
