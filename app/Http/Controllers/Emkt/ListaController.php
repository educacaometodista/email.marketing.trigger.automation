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
        return view('admin.emkt.listas.create')->with(['instituicoes' => $this->prefixo]);
    }

    public function store(Request $request)
    {
        if($request->hasFile('import_file'))
        {
            if(isset($this->instituicoes))
            {
                $extension = 'csv';
                $subject = $request->input('subject');
                $date = date('d-m', strtotime($request->input('date')));
                $period = date('Y', strtotime($request->input('date')));

                $explode_date = explode('-', $date);
                $month = $explode_date[1];
                $period .= $month >=7 ? '-2' : '';
                
                $currentFile = $this->planilha()->load($request->file('import_file')->getRealPath());
                
                $this->planilha()->filter($currentFile, $extension, str_replace(' ', '-', strtolower($subject)), $date.'-'.$period, 'akna_lists');

                $codigos_dos_processos = [];
            
                foreach ($this->instituicoes as $codigo_da_empresa => $instituicao)
                {
                    $nome_do_arquivo = strtolower($this->prefixo[$instituicao]).'-'.strtolower($subject).'-'.$date.'-'.$period.'.'.$extension;
                    $nome_da_lista = 'teste-'.ucwords($this->prefixo[$instituicao]).' - '.str_replace('-', ' ', $subject).' - '.str_replace('-', '/', $date).' - '.str_replace('-', '/',$period);
                    Session::flash('message-'.$this->prefixo[$instituicao], $this->aknaAPI()->importarListaDeContatos($nome_da_lista, $nome_do_arquivo, $instituicao, $codigo_da_empresa));
                }

                return back();

            } else {

                return back()->with('warning', 'Não há instituições cadastradas para importar este arquivo!');
            }

        } else {
            return back()->with('message', 'Você precisa importar um documento!');
        }
    }
}
