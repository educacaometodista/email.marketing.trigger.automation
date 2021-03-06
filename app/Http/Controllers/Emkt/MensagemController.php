<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensagem;
use App\Instituicao;
use App\TipoDeAcao;
use Storage;

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
        return view('admin.emkt.mensagens.create');
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
            'titulo' => 'required|min:2|max:80|string|unique:mensagens',
            'nome_do_arquivo' => 'required|min:1|max:10000|string',
            'conteudo_do_email' => 'required|min:1|string',
            'conteudo_do_sms' => 'required|min:1|max:155|string',
            'assunto' => 'required|min:2|max:150|string',
        ]);
        
        $mensagem = new Mensagem;
        $mensagem->titulo = $request->input('titulo');
        $mensagem->nome_do_arquivo = $request->input('nome_do_arquivo');
        $mensagem->conteudo_do_email = $request->input('conteudo_do_email');
        $mensagem->conteudo_do_sms = $request->input('conteudo_do_sms');
        $mensagem->assunto = $request->input('assunto');
        $mensagem->save();

        Mensagem::createFile($mensagem->nome_do_arquivo, $mensagem->conteudo_do_email, $mensagem->tipo_de_acao_da_instituicao->instituicao->prefixo);

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

        return view('admin.emkt.mensagens.edit', ['mensagem' => Mensagem::findOrFail($id)]);
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
            'titulo' => 'required|min:2|max:80|string',
            'nome_do_arquivo' => 'required|min:1|max:10000|string',
            'conteudo_do_email' => 'required|min:1|string',
            'conteudo_do_sms' => 'required|min:1|max:155|string',
            'assunto' => 'required|min:2|max:150|string'
        ]);
        
        $mensagem = Mensagem::findOrFail($id);

        $nome_do_arquivo = $mensagem->nome_do_arquivo;

        $mensagem->update([
            'titulo' => $request->titulo,
            'nome_do_arquivo' => $request->nome_do_arquivo,
            'conteudo_do_email' => $request->conteudo_do_email,
            'conteudo_do_sms' => $request->conteudo_do_sms,
            'assunto' => $request->assunto
        ]);

        Mensagem::editFileContent($request->nome_do_arquivo, $request->conteudo_do_email, $mensagem->tipo_de_acao_da_instituicao->instituicao->prefixo);
        Mensagem::renameFile($nome_do_arquivo, $request->nome_do_arquivo, $mensagem->tipo_de_acao_da_instituicao->instituicao->prefixo);

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
        $mensagem = Mensagem::findOrFail($id);
        Mensagem::deleteFile($mensagem->nome_do_arquivo, $mensagem->tipo_de_acao_da_instituicao->instituicao->prefixo);
        $mensagem->delete();

        return redirect()->route('admin.mensagens.index')
            ->with('success', 'Mensagem removida com sucesso!');
    }

}
