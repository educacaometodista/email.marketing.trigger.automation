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

        $instituicoes_selecionadas_ids = [];

        $instituicoes = Instituicao::whereHas('tipos_de_acoes_da_instituicao')->get();

        foreach($instituicoes as $instituicao)
            if(!is_null($request->input('instituicao-'.strtolower($instituicao->prefixo))))
                array_push($instituicoes_selecionadas_ids, $instituicao->id);
        
        Session::remove('instituicoes_selecionadas_ids');
        Session::put('instituicoes_selecionadas_ids', $instituicoes_selecionadas_ids);


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
            $lista['tipo_de_acao_da_instituicao'] = null;
            array_push($listas_de_contatos, $lista);
        }

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

            $instituicoes_selecionadas_ids = Session::get('instituicoes_selecionadas_ids');
            $instituicoes = [];

            foreach ($instituicoes_selecionadas_ids as $id_da_instituicao_selecionada)
                array_push($instituicoes, Instituicao::findOrFail($id_da_instituicao_selecionada));

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

            //adiciona <option value="all">Todas</option>
            if($hasColumn)
                array_unshift($instituicoes_selecionadas, ['nome' => 'Todas', 'tipo_de_acao_da_instituicao' => 'all']);

            return view('admin.emkt.listas.selecionar-instituicoes', [
                'instituicoes' => $instituicoes_selecionadas,
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

        $instituicoes_selecionadas = [];

        $instituicoes_selecionadas_ids = Session::get('instituicoes_selecionadas_ids');

        foreach ($instituicoes_selecionadas_ids as $id_da_instituicao_selecionada)
            array_push($instituicoes_selecionadas, Instituicao::findOrFail($id_da_instituicao_selecionada));


        $i = 0;
        foreach ($files as $file)
        {
            if(!is_null($request->input($file['input_instituicao'])))
            {
                $files[$i]['tipo_de_acao_da_instituicao'] = $request->input($file['input_instituicao']);
            }
            $i++;
        }

        $nomes_das_listas = $this->import($files, $extension, $instituicoes_selecionadas, $date, $importacao_de_listas);

        Session::remove('importacao_de_listas');

        return redirect()->route('admin.listas.create');
    }

    public function import($files, $extension, $instituicoes_selecionadas, $date, $importacao_de_listas)
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
        
        //validation alerts
        foreach ($listas_de_contatos as $lista) {
            if($lista == 'invalid')
            {
                Session::flash('danger', 'O formato do arquivo não é válido!');
                return redirect()->route('admin.listas.selecionar-instituicoes');
            }
        }

        $identificador_do_processo = $importacao_de_listas['identificador_do_processo'];
        $processo = new Processo;
        $processo->identificador = $identificador_do_processo;
        $processo->progresso = 0;
        $processo->save();
        $processo = null;

        $total_de_contatos_das_listas = 0;

        if(array_key_exists('all', $listas_de_contatos)) {
            foreach ($instituicoes_selecionadas as $instituicao)
                if(array_key_exists(strtoupper($instituicao->prefixo), $listas_de_contatos['all']))
                    $total_de_contatos_das_listas += count($listas_de_contatos['all'][strtoupper($instituicao->prefixo)]);
        } else {

            foreach ($instituicoes_selecionadas as $instituicao)
            if(array_key_exists(strtoupper($instituicao->prefixo), $listas_de_contatos))
                $total_de_contatos_das_listas += count($listas_de_contatos[strtoupper($instituicao->prefixo)]);
        }

        foreach ($instituicoes_selecionadas as $instituicao)
        {
            $status = false;

            if(array_key_exists(strtoupper($instituicao->prefixo), $listas_de_contatos))
            {
                if($this->aknaAPI()->importarContatos($listas_de_contatos[strtoupper($instituicao->prefixo)], $instituicao, $dados, $identificador_do_processo, $total_de_contatos_das_listas) == "Ok")
                {
                    Session::flash('message-success-'.$instituicao->prefixo, 'Lista importada com sucesso em '.$instituicao->nome.'!');
                }

                if(array_key_exists(strtoupper($instituicao->prefixo), $listas_de_contatos))
                {
                    if($this->aknaAPI()->importarContatos($listas_de_contatos[strtoupper($instituicao->prefixo)], $instituicao, $dados, $identificador_do_processo, $total_de_contatos_das_listas) == "Ok")
                    {
                        Session::flash('message-success-'.$instituicao->prefixo, 'Lista importada com sucesso em '.$instituicao->nome.'!');
                    }
                }

            } elseif(array_key_exists('all', $listas_de_contatos)) {
                if(array_key_exists(strtoupper($instituicao->prefixo), $listas_de_contatos['all']))
                {
                    if($this->aknaAPI()->importarContatos($listas_de_contatos['all'][strtoupper($instituicao->prefixo)], $instituicao, $dados, $identificador_do_processo, $total_de_contatos_das_listas) == "Ok")
                    {
                        Session::flash('message-success-'.$instituicao->prefixo, 'Lista importada com sucesso em '.$instituicao->nome.'!');
                    }
                }

                
            }
        }

        $processo = Processo::where('identificador', $identificador_do_processo)->first();

        $processo->update([
            'identificador' => $identificador_do_processo,
            'progresso' => 'Ok',
        ]);

        return $listas_de_contatos;
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
