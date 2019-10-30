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
use App\TipoDeAcaoDaInstituicao;
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
        Session::remove('importacao-de-listas');

        return view('admin.emkt.acoes.create', [
            'instituicoes' =>  Instituicao::whereHas('tipos_de_acoes_da_instituicao')->get(),
            'tipos_de_acoes' =>  TipoDeAcao::whereHas('tipo_de_acao_das_instituicoes')->get()
            ]);
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
            $data_agendamento = $request->input('data_agendamento');
            $hora_agendamento = $request->input('hora_agendamento');

            $criacao_de_acao = [];
            $criacao_de_acao['titulo'] = $request->input('titulo');
            $criacao_de_acao['data_agendamento'] = $request->input('data_agendamento');
            $criacao_de_acao['hora_agendamento'] = $request->input('hora_agendamento');

            Session::remove('criacao-de-acao');
            Session::put('criacao-de-acao', $criacao_de_acao);
            
            $importacao_de_listas = (new ListaController())->saveInSession($request->file('import_file'), date('d-m-Y', strtotime($request->input('date'))), $request->input('tipo_de_acao'));
            
            return redirect()->route('admin.acoes.selecionar-instituicoes');
            
        } else {
            return back();
        }
    }

    public function selecionar_instituicoes()
    {
        if(Session::has('importacao-de-listas'))
        {
            $importacao_de_listas = Session::get('importacao-de-listas'); 
            
            $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($importacao_de_listas) {
                    //$query->where('tipo_de_acao_id', $importacao_de_listas['tipo_de_acao']);
                }
            )->get();

            $instituicoes_selecionadas = [];
            $instituicao_array = [];

            foreach ($instituicoes as $instituicao) {
                foreach ($instituicao->tipos_de_acoes_da_instituicao as $tipo_de_acao_da_instituicao) {
                    if($tipo_de_acao_da_instituicao->tipo_de_acao_id == $importacao_de_listas['tipo_de_acao'])
                    {
                        $instituicao_array['tipo_de_acao_da_instituicao'] = $tipo_de_acao_da_instituicao->id;
                        $instituicao_array['nome'] = $instituicao->nome;
                        array_push($instituicoes_selecionadas, $instituicao_array);
                    }
                }
            }

            return view('admin.emkt.acoes.selecionar-instituicoes', [
                'instituicoes' => $instituicoes_selecionadas,
                'listas' => $importacao_de_listas['arquivos']
                ]);

        } else {
            return redirect()->route('admin.acoes.create');
        }
    }


    public function store(Request $request)
    { 
        //listas
        $importacao_de_listas = Session::get('importacao-de-listas');
        $tipo_de_acao_id = $importacao_de_listas['tipo_de_acao'];
        $files = $importacao_de_listas['arquivos'];
        $extension = 'csv';
        $date = $importacao_de_listas['data'];

        //ações
        $criacao_de_acao = Session::get('criacao-de-acao');
        $titulo = $criacao_de_acao['titulo'];
        $data_agendamento = $criacao_de_acao['data_agendamento'];
        $hora_agendamento = $criacao_de_acao['hora_agendamento'];

        $titulo_da_acao = $titulo.date('Y-m-d', strtotime($date));
        
        $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($tipo_de_acao_id){
                $query->where('tipo_de_acao_id', '=', $tipo_de_acao_id);
            }
        )->get();
        
        //$hasAction = true;
        $hasAction = false;
        $instituicoes_selecionadas = [];

        //
        $instituicoes_selecionadas = $instituicoes;

        $i = 0;
        foreach ($files as $file)
        {
            if(!is_null($request->input($file['input_instituicao'])))
            {
                $files[$i]['tipo_de_acao_da_instituicao'] = $request->input($file['input_instituicao']);
            }
            $i++;
        }

        $nomes_das_listas = (new ListaController())->import($files, $extension, $instituicoes_selecionadas, $date, $hasAction, $importacao_de_listas);

        //
        foreach ($files as $file)
        {
            $tipo_de_acao_da_instituicao = TipoDeAcaoDaInstituicao::findOrFail($file['tipo_de_acao_da_instituicao']);
        }

        foreach ($instituicoes_selecionadas as $instituicao) {

            if(array_key_exists(strtoupper($instituicao->prefixo), $nomes_das_listas)) {
                //(new AknaController())->criarAcaoPontual($titulo_da_acao, $mensagem, $agendamento_envio, $instituicao, $nomes_das_listas);
            }
        }

        Session::remove('importacao-de-listas');
        Session::remove('criacao-de-acao');

        return redirect()->route('admin.acoes.create');
    }

}
