<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Emkt\AknaController;
use App\Http\Controllers\PlanilhaController;
use App\Instituicao;
use App\Lista;
use App\TipoDeAcao;
use Session;
use App\TipoDeAcaoDaInstituicao;
use App\Processo;


class ListaController extends Controller
{
    public function __construct()
    {
        $this->prefixo = Instituicao::all()->pluck('prefixo', 'nome')->toArray();
        return $this->middleware('auth:admin');        
    }

    public function planilha()
    {
        return new PlanilhaController;
    }

    public function aknaAPI()
    {
        return new AknaController;
    }

    public function index()
    {
        return view('admin.emkt.listas.index');
    }

    public function create()
    {
        Session::remove('importacao-de-listas');

        return view('admin.emkt.listas.create')->with([
            'instituicoes' =>  Instituicao::whereHas('tipos_de_acoes_da_instituicao')->get(),
            'tipos_de_acoes' =>  TipoDeAcao::whereHas('tipo_de_acao_das_instituicoes')->get()
            ]);
    }

    public function upload(Request $request)
    {
        /*$request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv,txt',
            'tipo_de_acao' => 'required|min:1|max:255|string',
            'date' => 'required|date'
        ]);*/

        if($request->hasFile('import_file'))
        {
            
            $importacao_de_listas = $this->saveInSession($request->file('import_file'), date('d-m-Y', strtotime($request->input('date'))), $request->input('tipo_de_acao'));
            return redirect()->route('admin.listas.selecionar-instituicoes');
            
        } else {
            return back();
        }
    }

    public function saveInSession($files, $date, $tipo_de_acao_id)
    {
        $identificador_do_processo = md5(uniqid(rand(), true));
        $extension = 'csv';
        $listas_de_contatos = [];
        $count = 0;
        $lista = [];
        $tipo_de_acao_da_instituicao = null;

        foreach ($files as $file)
        {
            $lista['input_instituicao'] = 'lista_da_instituicao_'.++$count;
            $lista['ClientOriginalName'] = $file->getClientOriginalName();
            $lista['file_content'] = $this->planilha()->load($file->getRealPath());
            $lista['tipo_de_acao_da_instituicao'] = $tipo_de_acao_id;
            array_push($listas_de_contatos, $lista);
        }

        $hasAction = false;
        $importacao_de_listas = [];

        $importacao_de_listas['identificador_do_processo'] = $identificador_do_processo;
        $importacao_de_listas['tipo_de_acao'] = $tipo_de_acao_id;
        $importacao_de_listas['data'] = $date;
        $importacao_de_listas['arquivos'] = $listas_de_contatos;

        Session::remove('importacao-de-listas');
        Session::put('importacao-de-listas', $importacao_de_listas);

        return $importacao_de_listas;
    }

    public function selecionar_instituicoes()
    {

        if(Session::has('importacao-de-listas'))
        {
            $importacao_de_listas = Session::get('importacao-de-listas');

            $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($importacao_de_listas) {
                    $query->where('tipo_de_acao_id', '=', $importacao_de_listas['tipo_de_acao']);
                }
            )->get();

            //Session::remove('importacao-de-listas');

            return view('admin.emkt.listas.selecionar-instituicoes', [
                'instituicoes' => $instituicoes,
                'listas' => $importacao_de_listas['arquivos']
                ]);

        } else {
            return redirect()->route('admin.listas.create');
        }
    }

    public function store(Request $request)
    {
        $importacao_de_listas = Session::get('importacao-de-listas');
        $tipo_de_acao_id = $importacao_de_listas['tipo_de_acao'];
        $files = $importacao_de_listas['arquivos'];
        $extension = 'csv';
        $date = $importacao_de_listas['data'];

        $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($tipo_de_acao_id){
                $query->where('tipo_de_acao_id', '=', $tipo_de_acao_id);
            }
        )->get();
        
        $hasAction = false;
        $instituicoes_selecionadas = [];

        foreach($instituicoes as $instituicao)
        {
            if($hasAction){
                if(!is_null($request->input('instituicao-'.strtolower($instituicao->prefixo))))
                    array_push($instituicoes_selecionadas, $instituicao);
            } else {
                array_push($instituicoes_selecionadas, $instituicao);
            }
        }

        $nomes_das_listas = $this->import($files, $extension, $instituicoes_selecionadas, $date, $hasAction, $importacao_de_listas);

        Session::remove('importacao_de_listas');

        return redirect()->route('admin.listas.create');
    }

    public function import($files, $extension, $instituicoes_selecionadas, $date, $hasAction, $importacao_de_listas)
    {
        $explode_date = explode('-', str_replace('/', '-', $date));
        $day = $explode_date[0];
        $month = $explode_date[1];
        $period = $explode_date[2];
        $period .= $month >=7 ? '-2' : '';
        $dados = [];
        $dados['DATE'] = $date;
        $lista = null;

        $listas_de_contatos = $this->planilha()->filter($files, $extension, $instituicoes_selecionadas, $day.'-'.$month.'-'.$period, 'akna_lists');

        $identificador_do_processo = $importacao_de_listas['identificador_do_processo'];
        $processo = new Processo;
        $processo->identificador = $identificador_do_processo;
        $processo->progresso = 0;
        $processo->save();
        $processo = null;

        foreach ($instituicoes_selecionadas as $instituicao)
        {
            $status = false;

            if(array_key_exists($instituicao->prefixo, $listas_de_contatos))
            {
                if($this->aknaAPI()->importarContatos($listas_de_contatos[$instituicao->prefixo], $instituicao, $dados, $identificador_do_processo) == "Ok")
                {
                    Session::flash('message-success-'.$instituicao->prefixo, 'Lista importada com sucesso em '.$instituicao->nome.'!');
                }
            }

        }

        $processo = Processo::where('identificador', $identificador_do_processo)->first();

        $processo->update([
            'identificador' => $identificador_do_processo,
            'progresso' => 'Ok',
        ]);
    }

    public function getProgress()
    {
        $importacao_de_listas = Session::get('importacao-de-listas');
        $identificador_do_processo = $importacao_de_listas['identificador_do_processo'];
        $processo = Processo::where('identificador', $identificador_do_processo)->first();
        echo json_encode(['progresso_do_processo' => $processo->progresso]);
    }

    public function download($nome_da_lista, $extension)
    {
        $lista = Lista::where($nome_da_lista, 'nome_da_lista')->first();
        return (new PlanilhaController)->download(eval($lista), $extension);
    }
}
