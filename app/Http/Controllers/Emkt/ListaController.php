<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Emkt\AknaController;
use App\Http\Controllers\PlanilhaController;
use App\Instituicao;
use Session;

class ListaController extends Controller
{
    public $instituicoes;

    public function __construct()
    {
        $this->instituicoes = Instituicao::all()->pluck('nome', 'codigo_da_empresa')->toArray();
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
        $tipos_de_acoes = [ 
            'Ausentes' => 'Ausentes',
            'Inscritos Parciais' => 'Inscritos Parciais',
            'Inscritos Parciais Ead' => 'Inscritos Parciais Ead',
            'Lembrete de Prova' => 'Lembrete de Prova',
            'Aprovados Não Matriculados' => 'Aprovados Não Matriculados'
        ];

        return view('admin.emkt.listas.create')->with(['instituicoes' => $this->prefixo, 'tipos_de_acoes' => $tipos_de_acoes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv,txt',
            'subject' => 'required|min:2|max:30|string',
            'date' => 'required|date'
        ]);

        if($request->hasFile('import_file'))
        {
            $extension = 'csv';
            $subject = $request->input('subject');
            $date = date('d-m-Y', strtotime($request->input('date')));
            $currentFile = $this->planilha()->load($request->file('import_file')->getRealPath());
            $hasAction = false;

            return $this->import($currentFile, $extension, $subject, $date, $hasAction);

        } else {
            return back()->with('danger', 'Você precisa importar um documento!');
        }
    }

    public function import($currentFile, $extension, $subject, $date, $hasAction)
    {
        $explode_date = explode('-', str_replace('/', '-', $date));


        $day = $explode_date[0];
        $month = $explode_date[1];
        $period = $explode_date[2];
        $period .= $month >=7 ? '-2' : '';

        if(isset($this->instituicoes))
        {
            $this->planilha()->filter($currentFile, $extension, str_replace(' ', '-', $subject), $day.'-'.$month.'-'.$period, 'akna_lists');
            $all_files = $this->planilha()->getFiles('akna_lists');

            $codigos_dos_processos = [];
            $nomes_das_listas = [];
        
            foreach($this->instituicoes as $codigo_da_empresa => $instituicao)
            {
                $nome_do_arquivo = strtolower($this->prefixo[$instituicao]).'-'.strtolower($subject).'-'.$day.'-'.$month.'-'.$period.'.'.$extension;
                
                if(in_array(public_path("akna_lists/$nome_do_arquivo"), $all_files))
                {
                    $nome_da_lista = 'teste-'.ucwords($this->prefixo[$instituicao]).' - '.str_replace('-', ' ', $subject).' - '.$day.'/'.$month.' - '.str_replace('-', '/',$period);
                    Session::flash('message-'.$this->prefixo[$instituicao], $this->aknaAPI()->importarListaDeContatos($nome_da_lista, $nome_do_arquivo, $instituicao, $codigo_da_empresa));
                    $nomes_das_listas[$this->prefixo[$instituicao]] = $nome_da_lista;
                }
            }

            return $hasAction == true ? $nomes_das_listas : back();

        } else {

            return back()->with('warning', 'Não há instituições cadastradas para importar este arquivo!');
        }   
    }
}
