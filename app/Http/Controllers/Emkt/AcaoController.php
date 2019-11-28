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
use App\Http\Controllers\Sms\ZenviaController;


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

    public function index()
    {
        
        return view('admin.emkt.acoes.index', ['acoes' => Acao::all()]);
    }

    public function create()
    {
        Session::remove('importacao-de-listas');

        return view('admin.emkt.acoes.create', [
            'instituicoes' =>  Instituicao::whereHas('tipos_de_acoes_da_instituicao')->get(),
            'tipos_de_acoes' =>  TipoDeAcao::whereHas('tipo_de_acao_das_instituicoes')->get()
            ]);
    }

    public function uploadLists(Request $request)
    {
        /*$request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv,txt',
            'tipo_de_acao' => 'required|min:1|max:255|string',
            'date' => 'required|date'
        ]);*/

        $hasList = false;

        if($request->hasFile('import_file') && $request->input('hasList') == 'importar-agora')
        { 
            (new ListaController())->saveInSession($request->file('import_file'), date('d-m-Y', strtotime($request->input('date'))), $request->input('tipo_de_acao'));
            $hasList = 'importar-agora';

        } else if(!$request->hasFile('import_file') && $request->input('hasList') == 'importar-agora') {
            //alert "voce deve importar uma lista de contatos"
            return back();   
        } else {
            $hasList = 'concluido';
        }

        $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao')->get();
        $data_agendamento = $request->input('data_agendamento');
        $hora_agendamento = $request->input('hora_agendamento');
        $criacao_de_acao = [];
        $criacao_de_acao['titulo'] = $request->input('titulo');
        $criacao_de_acao['data_agendamento'] = $request->input('data_agendamento');
        $criacao_de_acao['hora_agendamento'] = $request->input('hora_agendamento');
        $criacao_de_acao['instituicoes_selecionadas_ids'] = [];
        $criacao_de_acao['hasList'] = $hasList;

        $criacao_de_acao['enviar_sms'] = !is_null($request->input('enviar_sms')) ? $request->input('enviar_sms') : false;
        $criacao_de_acao['enviar_email'] = !is_null($request->input('enviar_email')) ? $request->input('enviar_email') : false;




        foreach($instituicoes as $instituicao)
            if(!is_null($request->input('instituicao-'.strtolower($instituicao->prefixo))))
                array_push($criacao_de_acao['instituicoes_selecionadas_ids'], $instituicao->id);

        Session::remove('criacao-de-acao');
        Session::put('criacao-de-acao', $criacao_de_acao);

        if($hasList == 'concluido')
        {
            $this->criar_acao(null);

        } else {
            return redirect()->route('admin.acoes.selecionar-instituicoes');

        }

        //redirect to - se tiver lista
        //OU
        //store - se não tiver
    }

    public function selecionar_instituicoes()
    {
        if(Session::has('importacao-de-listas'))
        {
            $importacao_de_listas = Session::get('importacao-de-listas');

            // verifica se existe a coluna instituicao no arquivo e adiciona <option value="all"></option>
            $columnName = 'instituição';
            $hasColumn = false;
            foreach ($importacao_de_listas['arquivos'][0]['file_content']->toArray() as $file_row)
            {
                if(array_key_exists($columnName, $file_row))
                    $hasColumn = true;
                //else
                //    $hasColumn = false;
            }

            $criacao_de_acao = Session::get('criacao-de-acao');
            $instituicoes_selecionadas = [];
            $instituicoes_selecionadas_array = [];
            
            foreach ($criacao_de_acao['instituicoes_selecionadas_ids'] as $id_da_instituicao_selecionada)
                array_push($instituicoes_selecionadas, Instituicao::findOrFail($id_da_instituicao_selecionada));

            $instituicao_array = [];

            foreach ($instituicoes_selecionadas as $instituicao)
            {
                foreach ($instituicao->tipos_de_acoes_da_instituicao as $tipo_de_acao_da_instituicao)
                {
                    if($tipo_de_acao_da_instituicao->tipo_de_acao_id == $importacao_de_listas['tipo_de_acao'])
                    {
                        $instituicao_array['tipo_de_acao_da_instituicao'] = $tipo_de_acao_da_instituicao->id;
                        $instituicao_array['nome'] = $instituicao->nome;
                        array_push($instituicoes_selecionadas_array, $instituicao_array);
                    }
                }
            }

            //adiciona <option value="all">Todas</option>
            if($hasColumn)
                array_unshift($instituicoes_selecionadas_array, ['nome' => 'Todas', 'tipo_de_acao_da_instituicao' => 'all']);

            return view('admin.emkt.acoes.selecionar-instituicoes', [
                'instituicoes' => $instituicoes_selecionadas_array,
                'listas' => $importacao_de_listas['arquivos']
                ]);

        } else {
            return redirect()->route('admin.acoes.create');
        }
    }

    public function store(Request $request)
    {
        //acao
        $criacao_de_acao = Session::get('criacao-de-acao');
        $hasList = $criacao_de_acao['hasList'];

        //listas
        $importacao_de_listas = Session::get('importacao-de-listas');
        $tipo_de_acao_id = $importacao_de_listas['tipo_de_acao'];
        $files = $importacao_de_listas['arquivos'];
        $extension = 'csv';
        $date = $importacao_de_listas['data'];
        $dados['DATE'] = $date;

        $instituicoes_selecionadas = [];

        foreach ($criacao_de_acao['instituicoes_selecionadas_ids'] as $id_da_instituicao_selecionada)
            array_push($instituicoes_selecionadas, Instituicao::findOrFail($id_da_instituicao_selecionada));

        
        if($hasList == 'importar-agora')
        {
            $i = 0;
            foreach ($files as $file)
            {
                if(!is_null($request->input($file['input_instituicao'])))
                {
                    $files[$i]['tipo_de_acao_da_instituicao'] = $request->input($file['input_instituicao']);
                }
                $i++;
            }

            if($enviar_email) {
                $listas_de_contatos = (new ListaController())->import($files, $extension, $instituicoes_selecionadas, $date, $importacao_de_listas);
            } else {
                $listas_de_contatos = false;
            }

        } else {
            $listas_de_contatos = 'importadas';
        }

        return $this->criar_acao($listas_de_contatos);
    }

    public function criar_acao($listas_de_contatos)
    { 
        //listas
        $importacao_de_listas = Session::get('importacao-de-listas');
        $tipo_de_acao_id = $importacao_de_listas['tipo_de_acao'];
        $files = $importacao_de_listas['arquivos'];
        $extension = 'csv';
        $date = $importacao_de_listas['data'];
        $dados['DATE'] = $date;

        //ações
        $criacao_de_acao = Session::get('criacao-de-acao');
        $titulo = $criacao_de_acao['titulo'];
        $data_agendamento = $criacao_de_acao['data_agendamento'];
        $hora_agendamento = $criacao_de_acao['hora_agendamento'];
        $agendamento_envio = $data_agendamento.' '.$hora_agendamento;
        $enviar_sms = $criacao_de_acao['enviar_sms'];
        $enviar_email = $criacao_de_acao['enviar_email'];



        $titulo_da_acao = $titulo.' '.str_replace('-', '/', date('d-m-Y', strtotime($date)));
        
        $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($tipo_de_acao_id){
                $query->where('tipo_de_acao_id', '=', $tipo_de_acao_id);
            }
        )->get();
        
        $instituicoes_selecionadas = [];

        //$instituicao_selecionada = null;
        /*foreach ($criacao_de_acao['instituicoes_selecionadas_ids'] as $id_da_instituicao_selecionada)
        {
            $instituicao_selecionada = Instituicao::findOrFail($id_da_instituicao_selecionada)::with('tipos_de_acoes_da_instituicao')->get();
                array_push($instituicoes_selecionadas, $instituicao_selecionada);
        }*/

        $instituicoes_selecionadas = $instituicoes;
        
        $response = '';

        foreach ($instituicoes_selecionadas as $instituicao)
        {
            if(array_key_exists(strtoupper($instituicao->prefixo), $listas_de_contatos))
            {
                $tipo_de_acao_da_instituicao = TipoDeAcaoDaInstituicao::with('mensagem')
                    ->where('tipo_de_acao_id', $tipo_de_acao_id)
                    ->where('instituicao_id', $instituicao->id)->get()->first();

                //EMKT
                if($enviar_email)
                {
                    $akna_response = (new AknaController())->criarAcaoPontual($titulo_da_acao, $tipo_de_acao_da_instituicao->mensagem, $agendamento_envio, $tipo_de_acao_da_instituicao->instituicao, $tipo_de_acao_da_instituicao->getNomeDaListaDeContatos($dados));
                    $this->salvarAcao($titulo_da_acao, count($listas_de_contatos[strtoupper($instituicao->prefixo)]), $agendamento_envio, Auth::user()->id, $instituicao->id);
                    Session::flash('message-'.$akna_response['status'].'-acao-'.$instituicao->prefixo, $akna_response['message'].' !');
                }
                
                //SMS
                if($enviar_sms)
                {
                    $agendamento_sms = $data_agendamento.'T'.$hora_agendamento.':00';
                    $zenvia_response = (new ZenviaController())->sendMulti($this->setListaDeCelulares($listas_de_contatos[strtoupper($instituicao->prefixo)]), $instituicao->remetente_do_sms, $agendamento_sms, $tipo_de_acao_da_instituicao->mensagem->conteudo_do_sms, $instituicao->nome);
                    Session::flash('message-'.$zenvia_response['status'].'-sms-'.$instituicao->prefixo, $zenvia_response['message'].' !');
                }

            }

        }

        Session::remove('importacao-de-listas');
        Session::remove('criacao-de-acao');

        return redirect()->route('admin.acoes.create');
    }

    public function salvarAcao($titulo, $destinatarios, $agendamento, $usuario_id, $instituicao_id)
    {
        $acao = new Acao;
        $acao->titulo = $titulo;
        $acao->destinatarios = $destinatarios;
        $acao->agendamento = $agendamento;
        $acao->usuario_id = $usuario_id;
        $acao->instituicao_id = $instituicao_id;
        $acao->save();
    }

    public function setListaDeCelulares($lista_de_contatos)
    {
        $lista_de_celulares = [];

        foreach($lista_de_contatos as $contato)
                if(!is_null($contato['CELULAR']) && $contato['CELULAR'] != '')
                    array_push($lista_de_celulares, $contato['CELULAR']);

        return $lista_de_celulares;
    }

}
