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
           $this->saveInSession($request->file('import_file'), date('d-m-Y', strtotime($request->input('date'))), $request->input('tipo_de_acao'));

            return redirect()->route('admin.listas.selecionar-instituicoes');
            
        } else {

            return back();
        }
    }

    public function saveInSession($files, $date, $tipo_de_acao_id)
    {
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
        $importacao_de_listas['tipo_de_acao'] = $tipo_de_acao_id;
        $importacao_de_listas['data'] = $date;
        $importacao_de_listas['arquivos'] = $listas_de_contatos;

        Session::remove('importacao-de-listas');
        Session::put('importacao-de-listas', $importacao_de_listas);
    }

    public function selecionar_instituicoes()
    {
        $importacao_de_listas = Session::get('importacao-de-listas');

        $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($importacao_de_listas) {
                $query->where('tipo_de_acao_id', '=', $importacao_de_listas['tipo_de_acao']);
            }
        )->get();

        return view('admin.emkt.listas.selecionar-instituicoes', [
            'instituicoes' => $instituicoes,
            'listas' => $importacao_de_listas['arquivos']
            ]);
    }

    public function store(Request $request)
    {
        $importacao_de_listas = Session::get('importacao-de-listas');
        $tipo_de_acao_id = $importacao_de_listas['tipo_de_acao'];
        $listas = $importacao_de_listas['arquivos'];
        $extension = 'csv';
        $date = $importacao_de_listas['data'];
        $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao', function($query) use($tipo_de_acao_id){
                $query->where('tipo_de_acao_id', '=', $tipo_de_acao_id);
            }
        )->get();
        
        $currentFiles = [];
        
        foreach($listas as $lista)
            array_push($currentFiles, $lista);

        $hasAction = false;
        
        $instituicoes_selecionadas = [];

        foreach($instituicoes as $instituicao)
        {
        }

        return $this->importSingle($currentFiles, $extension, $instituicoes_selecionadas, $date, $hasAction);
    }

    public function importSingle($currentFiles, $extension, $instituicoes_selecionadas, $date, $hasAction)
    {
        $explode_date = explode('-', str_replace('/', '-', $date));
        $day = $explode_date[0];
        $month = $explode_date[1];
        $period = $explode_date[2];
        $period .= $month >=7 ? '-2' : '';


        if(isset($instituicoes_selecionadas))
        {
          
            $listas_de_contatos = $this->planilha()->filter($currentFiles, $extension, $instituicoes_selecionadas, $day.'-'.$month.'-'.$period, 'akna_lists');

            foreach ($listas_de_contatos as $lista_de_contatos)
            {
                foreach($lista_de_contatos as $contato)
                {

                }
            }

            /*foreach($instituicoes_selecionadas as $instituicao)
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
            }*/

            //return $hasAction == true ? $nomes_das_listas : back();

        } else {

            return back()->with('warning', 'Não há instituições cadastradas para importar este arquivo!');
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
