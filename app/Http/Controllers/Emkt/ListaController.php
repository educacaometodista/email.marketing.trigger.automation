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

class ListaController extends Controller
{
    public $multiplos_arquivos;

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
        return view('admin.emkt.listas.create')->with(['instituicoes' =>  Instituicao::whereHas('tipos_de_acoes_da_instituicao')->get(), 'tipos_de_acoes' =>  TipoDeAcao::whereHas('tipo_de_acao_das_instituicoes')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv,txt',
            'tipo_de_acao' => 'required|min:1|max:255|string',
            'date' => 'required|date'
        ]);

        if($request->hasFile('import_file'))
        {
            $extension = 'csv';
            $date = date('d-m-Y', strtotime($request->input('date')));
            $currentFile = $this->planilha()->load($request->file('import_file')->getRealPath());
            $hasAction = false;
            $this->multiplos_arquivos = false;
            //$multiplos_arquivos = $request->input('multiplos_arquivos');
            $tipo_de_acao_id = $request->input('tipo_de_acao');
            $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao')->get();
            $instituicoes_selecionadas = [];

            foreach($instituicoes as $instituicao)
                if(!is_null($request->input('instituicao-'.strtolower($instituicao->prefixo))) && $instituicao->tipos_de_acoes_da_instituicao->first()->tipo_de_acao->first()->id == $tipo_de_acao_id)
                    array_push($instituicoes_selecionadas, $instituicao);
                
            return $this->import($currentFile, $extension, $instituicoes_selecionadas, $date, $hasAction);

        } else {
            return back()->with('danger', 'Você precisa importar um documento!');
        }
    }

    public function import($currentFile, $extension, $instituicoes, $date, $hasAction)
    {
        $explode_date = explode('-', str_replace('/', '-', $date));
        $day = $explode_date[0];
        $month = $explode_date[1];
        $period = $explode_date[2];
        $period .= $month >=7 ? '-2' : '';

        if(isset($instituicoes))
        {
            //campo tipo de acaio em lista create
            $tipo_de_acao = $instituicoes->first()->tipos_de_acoes_da_instituicao->first()->tipo_de_acao->first()->nome;

            $this->planilha()->filter($currentFile, $extension, $instituicoes, $day.'-'.$month.'-'.$period, 'akna_lists', $this->multiplos_arquivos);

            $all_files = $this->planilha()->getFiles('akna_lists');

            $codigos_dos_processos = [];
            $nomes_das_listas = [];

            //dd($all_files);
        
            foreach($instituicoes as $instituicao)
            {
                $nome_do_arquivo = strtolower($this->prefixo[$instituicao->nome]).'-'.str_replace('-a-distancia', '', str_replace(' ', '-', strtolower($tipo_de_acao))).'-'.$day.'-'.$month.'-'.$period.'.'.$extension;

                $nome_do_arquivo = str_replace(' ', '-', $nome_do_arquivo);

                if(in_array(public_path("akna_lists/$nome_do_arquivo"), $all_files))
                {
                    $nome_da_lista = 'teste-'.ucwords($this->prefixo[$instituicao->nome]).' - '.str_replace('-', ' ', $tipo_de_acao).' - '.$day.'/'.$month.' - '.str_replace('-', '/',$period);
                    $status = $this->aknaAPI()->importarListaDeContatos($nome_da_lista, $nome_do_arquivo, $instituicao->nome, $instituicao->codigo_da_empresa);
                    Session::flash('message-'.$this->prefixo[$instituicao->nome], $status);
                    $nomes_das_listas[$this->prefixo[$instituicao->nome]] = $nome_da_lista;
                }
            }

            return $hasAction == true ? $nomes_das_listas : back();

        } else {

            return back()->with('warning', 'Não há instituições cadastradas para importar este arquivo!');
        }   
    }

    public function download($nome_da_lista, $extension)
    {
        $lista = Lista::where($nome_da_lista, '==', 'nome_da_lista')->first();
        return (new PlanilhaController)->download(eval($lista), $extension);
    }
}
