<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Emkt\AknaController;
use App\Http\Controllers\PlanilhaController;

class EmktController extends Controller
{
    public function __construct()
    {
        $this->instituicoes = ['UMESP', 'UNIMEP', 'IZABELA', 'GRANBERY', 'CENTENARIO', 'IPA'];
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
        return view('admin.emkt.listas.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile('import_file'))
        {
            $extension = 'csv';
            $subject = $request->input('subject');
            $date = date('d-m', strtotime($request->input('date')));
            $period = date('Y', strtotime($request->input('date')));

            $explode_date = explode('-', $date);
            $month = $explode_date[1];
            $period .= $month >=7 ? '-2' : '';
            
            $currentFile = $this->planilha()->load($request->file('import_file')->getRealPath());
            
            $this->planilha()->filter($currentFile, $extension, $subject, $date.'-'.$period, 'akna_lists');

            
            foreach ($this->instituicoes as $instituicao)
            {
                $nome_do_arquivo = strtolower($instituicao).'-'.$subject.'-'.$date.'-'.$period.'.'.$extension;
                $nome_da_lista = 'teste'.$instituicao.' - '.str_replace('-', ' ', $subject).' - '.$date.' - '.str_replace('-', '/',$period);
                $this->aknaAPI()->importarListaDeContatos($nome_da_lista, $nome_do_arquivo, $instituicao);
            
            }

            return back()->with('message', 'Suas listas foram importadas, verifique sua conta no Akna');

        } else {
            return back()->with('message', 'Você precisa importar um documento!');
        }
    }


}
