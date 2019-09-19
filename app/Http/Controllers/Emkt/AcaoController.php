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
        $tipos_de_acoes = [ 
            'Ausentes' => 'Ausentes',
            'Inscritos Parciais' => 'Inscritos Parciais',
            'Inscritos Parciais a Distancia' => 'Inscritos Parciais Ead',
            'Lembrete de Prova' => 'Lembrete de Prova',
            'Aprovados Não Matriculados' => 'Aprovados Não Matriculados'
        ];

        return view('admin.emkt.acoes.create', ['instituicoes' => Instituicao::all(), 'tipos_de_acoes' => $tipos_de_acoes]);
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
            'date' => 'required|date',
            'tipo_de_acao' => 'required|min:2|max:30',
            'titulo' => 'required|min:2|max:30',
            'data_agendamento' => 'required|date',
            'hora_agendamento'=> 'required',
            'hasList' => 'required',
            'import_file' => 'required|file|mimes:xlsx,csv,txt'
        ]);


        $date = date('d-m-Y', strtotime($request->input('date')));
        $tipo_de_acao = $request->input('tipo_de_acao');
        $subject = $tipo_de_acao;
                
        $date = str_replace('-', '/', $date);
        $titulo_da_acao = $request->input('titulo').' '.$date;
        $agendamento_envio = $request->input('envio');
        $data_agendamento =  date('Y-m-d', strtotime($request->input('data_agendamento')));
        $hora_agendamento = $request->input('hora_agendamento');
        $agendamento_envio = $data_agendamento.' '.$hora_agendamento.':00';
        $extension = 'csv';
        $hasAction = true;
        $hasList = $request->input('hasList');

        $instituicoes = Instituicao::all();
        $instituicoes_selecionadas = [];

        foreach($instituicoes as $instituicao)
            if(!is_null($request->input('instituicao-'.strtolower($instituicao->prefixo))))
                array_push($instituicoes_selecionadas, $instituicao);

            //importar listas
            if($hasList == 'importar-agora')
            {
                if($request->hasFile('import_file'))
                {
                    $currentFile = $this->planilha()->load($request->file('import_file')->getRealPath());
                }
        
                $nomes_das_listas = (new ListaController())->import($currentFile, $extension, $subject, $date, $hasAction);

            } else {
                $nomes_das_listas = null;
            }


        $acoes_a_criar = [];

        foreach($instituicoes_selecionadas as $instituicao)
        {
            $status = $this->aknaAPI()->consultarAcao($titulo_da_acao, $instituicao);

            if($status == 'Ação não encontrada' && array_key_exists($instituicao->prefixo, $nomes_das_listas)) {
                $acoes_a_criar[$instituicao->prefixo] = $nomes_das_listas[$instituicao->prefixo];
            }
        }

        $status = null;

        foreach ($instituicoes_selecionadas as $instituicao)
        {
            $mensagem = Mensagem::all()
                ->where('tipo_de_acao', '=', $tipo_de_acao)
                ->where('instituicao_id', '=', $instituicao->id)
                ->first();

            if(isset($acoes_a_criar[$instituicao->prefixo]))
            {
                if(!is_null($request->input('instituicao-'.strtolower($instituicao->prefixo))))
                {
                    sleep(40);
                    $status = $this->aknaAPI()->criarAcaoPontual($titulo_da_acao, $mensagem, $agendamento_envio, $instituicao, $nomes_das_listas);
                        
                    if($status != 'Já existe uma campanha cadastrada com esse título!')
                    {
                        $acao = new Acao;
                        $acao->titulo = $titulo_da_acao;
                        $acao->envio = $agendamento_envio;
                        $acao->destinatarios = 0;
                        $acao->status = $status;
                        $acao->agendamento = $agendamento_envio;
                        $acao->usuario_id = Auth::user()->id;
                        $acao->mensagem_id = $mensagem->id;
                        $acao->save();
    
                    } else {
                        Session::flash('message-danger-'.$instituicao->prefixo, 'Já existe uma campanha cadastrada com o título "'.$titulo_da_acao.'" em '. $instituicao->nome.'.');
                    }
                        
                    Session::flash('success', "Ação criada com sucesso em $instituicao->nome!");

                }
            }
        }

        return back();
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
