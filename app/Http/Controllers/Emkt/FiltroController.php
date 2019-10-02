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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emkt.filtros.create');
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
            'nome' => 'required|min:2|max:255|string|unique:filtros',
            'regra' => 'required|min:2|max:255|string',
        ]);

        $filtro = new Filtro;
        $filtro->nome = $request->input('nome');
        $filtro->regra = $request->input('regra');
        $filtro->save();
        
        return redirect()->route('admin.filtros.edit', compact('filtro'))
            ->with('success', 'Filtro criado com sucesso!');
    }

    public function edit($id)
    {
        return view('admin.emkt.filtros.edit', ['filtro' => Filtro::findOrFail($id)]);
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

        $filtro = Filtro::findOrFail($id)->update([
            'nome' => $request->nome,
            'nome_de_exibicao' => $request->nome_de_exibicao,
        ]);

        return redirect()->route('admin.filtros.edit', compact('filtro'))
            ->with('success', 'Filtro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filtro::findOrFail($id)->delete();

        return redirect()->route('admin.filtros.index')
            ->with('success', 'Filtro removido com sucesso!');
    }
}
