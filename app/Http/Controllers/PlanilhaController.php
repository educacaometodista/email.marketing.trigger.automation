<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Chumper\Zipper\Zipper;
use illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use App\Planilhas\Planilha;
use Session;
use App\TipoDeAcaoDaInstituicao;

class PlanilhaController extends Controller
{
    public $filter_name;

    public $filtros = [];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function load($file_path)
    {
        return Excel::load($file_path)->get();
    }
    
    public function storeFile($file, $file_name, $extension, $storage_path=null)
    {
        Excel::create($file_name, function($excel) use ($file) {
            $excel->sheet('sheet_name', function($sheet) use ($file) {
                $sheet->fromArray($file);
                $sheet->setAutoSize(true);
            });
        })->store($extension, $storage_path);
    }

    public function getFiles($storage_path)
    {
        return glob(public_path("$storage_path/*"));
    }

    public function clearStorage($path)
    {
        $filesystem = new Filesystem;
        $filesystem->cleanDirectory(public_path("$path"));
        $filesystem->cleanDirectory(storage_path($path));
    }

    public function downloadZip($path)
    {
        $zipName = Session::get('zipName');
        Session::remove('zipName');

        if(is_string($zipName) && !is_null($zipName) && $zipName != '') {
            $files = glob(storage_path("$path/*"));
            \Zipper::make(public_path("storage/$path/$zipName.zip"))->add($files)->close();
            return response()->download(public_path("storage/$path/$zipName.zip"));
        } else {
            return back()->with('danger', 'Não há arquivos para baixar!');
        }
    }

    public function validator($tipo_de_acao, $currentFile)
    {
        $currentFile = is_object($currentFile) ? $currentFile->toArray() : (is_array($currentFile) ? $currentFile : null);

        
        /*if($tipo_de_acao == 'ausentes' || $tipo_de_acao == 'inscritos-parciais' || $tipo_de_acao == 'lembrete-de-prova' || $tipo_de_acao == 'aprovados-nao-matriculados') {
            
            $this->filter_name = 'Presencial';

        } elseif($tipo_de_acao == 'ausentes-a-distancia' || $tipo_de_acao == 'inscritos-parciais-a-distancia' || $tipo_de_acao == 'lembrete-de-prova-a-distancia' || $tipo_de_acao == 'aprovados-nao-matriculados-a-distancia')
        {
            $this->filter_name = 'Ead';
        }
        
        if($this->filter_name == 'Ead')
        {
            if(!empty($currentFile[0]))
            {
                if(!array_key_exists('nome', $currentFile[0]) || !array_key_exists('e_mail', $currentFile[0]) || !array_key_exists('número', $currentFile[0]) || !array_key_exists('ddd', $currentFile[0]))
                {
                    //Não possui todas as colunas
                    Session::flash('danger', 'O formato do arquivo não é válido!');
                    return false;
                }
            } else {
                Session::flash('danger', 'O formato do arquivo não é válido!');
                return false;
            }

        } elseif($this->filter_name == 'Presencial') {

            if(!empty($currentFile[0]))
            {
                if(!array_key_exists('nome', $currentFile[0]) || !array_key_exists('e_mail', $currentFile[0]) || !array_key_exists('celular', $currentFile[0]) || !array_key_exists('instituição', $currentFile[0]))
                {
                    //Não possui todas as colunas
                    Session::flash('danger', 'O formato do arquivo não é válido!');
                    return false;
                }
            } else {
                Session::flash('danger', 'O formato do arquivo não é válido!');
                return false;
            }
        }
        
        

        $campos = ['NOME', 'EMAIL', 'DDD', 'CELULAR', 'INSTITUICAO'];
        $campos_do_filtro = [];

        foreach($campos as $campo)
        {
            if(isset($this->filtro[$campo]))
            {
                array_push($campos_do_filtro, $this->filtro[$campo]);
            }
        }

        foreach($campos_do_filtro as $campo => $coluna_da_planilha)
        {
            if(!isset($currentFile[0][$coluna_da_planilha]))
            {
                Session::flash('danger', 'O formato do arquivo não é válido!');
                return false;
            }
        }
        */

    }

    /*public function getFilter($currentFile, $extension, $tipo_de_acao, $date, $storage_path)
    {
        if($this->filter_name == 'Ead')
        {
            $this->filtroEad($currentFile, $extension, $tipo_de_acao, $date, $storage_path);

        } elseif($this->filter_name == 'Presencial') {

            $this->filtroPresencial($currentFile, $extension, $tipo_de_acao, $date, $storage_path);

        }
    }*/

    public function filter($currentFiles, $extension, $instituicoes, $date, $storage_path)
    {

        //$tipo_de_acao = $instituicao->tipos_de_acoes_da_instituicao->first()->tipo_de_acao->first()->nome;

        //$this->filtro = $instituicoes->first()->tipos_de_acoes_da_instituicao->first()->filtro->first();

        
        foreach ($instituicoes as $instituicao) {
            $this->filtros[$instituicao->prefixo] = $instituicao->tipos_de_acoes_da_instituicao->first();
        }

        //dd($currentFiles);

        //dd($this->filtros);

        
        /*$this->filtro = eval("[
            'NOME' => 'nome',
            'EMAIL' => 'e_email',
            'CELULAR' => 'celular',
            'INSTITUICAO' => 'instituicao',
        ]");*/
        $tipo_de_acao_da_instituicao = null;

        foreach ($currentFiles as $currentFile) {
            $tipo_de_acao_da_instituicao = TipoDeAcaoDaInstituicao::findOrFail($currentFile['tipo_de_acao_da_instituicao']);

            //dd($tipo_de_acao_da_instituicao->instituicao);
            //dd($tipo_de_acao_da_instituicao->filtro);
            $this->getFilter($currentFile['file_content']->toArray(), $extension, $tipo_de_acao_da_instituicao, $date, $storage_path);
        }



        $currentFile = $currentFile->toArray();
        
        
       
    }

    public function getFilter($arrayFile, $extension, $tipo_de_acao_da_instituicao, $date, $storage_path)
    {
        //$filtro = $tipo_de_acao_da_instituicao->filtro;
        //array regra

        $filtro = [
            'NOME' => 'nome',
            'EMAIL' => 'e_mail',
            'CELULAR' => 'celular',
            'INSTITUICAO' => 'instituição',
        ];

        if($this->hasColumns($filtro, $arrayFile))
        {
            foreach ($arrayFile as $key_row => $row) {
                $arrayFile[$key_row] = $this->celular($filtro['CELULAR'], $row);
                $arrayFile[$key_row] = $this->clearRow($filtro, $arrayFile[$key_row]);
            }

            $arrayFile = $this->orderByColumn($filtro['INSTITUICAO'], $arrayFile);

            dd($arrayFile);

        } else {
            Session::flash('danger', 'O formato do arquivo não é válido!');
            return back();
        }

        
    }


    public function celular($nome_da_coluna, $row)
    {
       
        foreach($row as $key => $cell)
        {
            if($key == $nome_da_coluna)
            {
                $row[$nome_da_coluna] = str_replace('-', '', $row[$nome_da_coluna]);              
                $row[$nome_da_coluna] = str_replace('(', '', $row[$nome_da_coluna]);
                $row[$nome_da_coluna] = str_replace(')', '', $row[$nome_da_coluna]);
                $row[$nome_da_coluna] = str_replace(' ', '', $row[$nome_da_coluna]);
                if(strlen($row[$nome_da_coluna]) != 11)
                    $row[$nome_da_coluna] = '';            
            }
        }
        return $row;
    }

    public function clearRow($nomes_das_colunas, $row)
    {
        $removeColumn = false;
        $new_row = [];
        foreach($row as $key => $cell)
        {
            if(in_array($key, $nomes_das_colunas))
                $new_row[$key] = $cell;

        }
        return $new_row;
    }


    public function hasColumns($nomes_das_colunas, $arrayFile)
    {
       $hasColumns = false;
       foreach($nomes_das_colunas as $nome_da_coluna)
       {
            foreach($arrayFile as $row)
                if(array_key_exists($nome_da_coluna, $row))
                    $hasColumns = true;
       }
       return $hasColumns;  
    }

    public function orderByColumn($nome_da_coluna, $arrayFile)
    {
        $valores_da_coluna = [];
        $newArrayFile = [];

        foreach ($arrayFile as $key_row => $row) {
            if(!in_array($row[$nome_da_coluna], $valores_da_coluna))
                array_push($valores_da_coluna, $row[$nome_da_coluna]);
                
        }

        sort($valores_da_coluna);

        foreach ($valores_da_coluna as $valor) {
            foreach ($arrayFile as $key_row => $row) {
                if($valor == $row[$nome_da_coluna])
                {
                    array_push($newArrayFile, $row);
                }
            }
        }
        return $newArrayFile;
    }




    public function filtroPresencial($currentFile, $extension, $instituicoes, $date, $storage_path, $multiplos_arquivos)
    {
        $document_hash = md5($tipo_de_acao.$date.date('d-m-y h:i:s'));

        $headers = [];

        foreach($currentFile[0] as $header => $value)
        {
            array_push($headers, $header);
        }

        
        foreach($currentFile as $key_row => $row)
        {
            
            foreach($row as $key => $cell)
            {




                if($key == $this->filtro['CELULAR'])
                {
                    $currentFile[$key_row][$key] = str_replace('-', '', $currentFile[$key_row][$key]);
                    $currentFile[$key_row][$key] = str_replace('(', '', $currentFile[$key_row][$key]);
                    $currentFile[$key_row][$key] = str_replace(')', '', $currentFile[$key_row][$key]);
                    $currentFile[$key_row][$key] = str_replace(' ', '', $currentFile[$key_row][$key]);

                    if(isset($row[$this->filtro['DDD']]))
                        if(count($row[$this->filtro['DDD']]) == 2)
                            $currentFile[$key_row][$key] = $row[$this->filtro['DDD']].$currentFile[$key_row][$key];

                    if(strlen($currentFile[$key_row][$key]) != 9 && strlen($currentFile[$key_row][$key]) != 11)
                        if(isset($currentFile[$key_row][$key]))
                            $currentFile[$key_row][$key] = '';

                            
                }
                
                if(!($key == $this->filtro['NOME'] || $key == $this->filtro['EMAIL'] || $key == $this->filtro['CELULAR']) && $this->filtro['CELULAR'])
                    unset($currentFile[$key_row][$key]);
            
                







            }





            
            $planilha = new Planilha;
            $planilha->nome = $currentFile[$key_row][$this->filtro['NOME']];
            $planilha->email = $currentFile[$key_row][$this->filtro['EMAIL']];
            $planilha->celular = ($currentFile[$key_row][$this->filtro['CELULAR']]) ? $currentFile[$key_row][$this->filtro['CELULAR']] : '';

            $planilha->instituicao = $currentFile[$key_row][$this->filtro['INSTITUICAO']];

            $planilha->documento = $document_hash;
            $planilha->save();









        }

        Session::put('zipName', "$tipo_de_acao-$date");

        $currentFile = $this->select($document_hash);

        $umesp_file = [];
        $unimep_file = [];
        $izabela_file = [];
        $granbery_file = [];
        $fames_file = [];
        $ipa_file = [];

        foreach($currentFile as $row)
        {
            switch ($row['instituicao']) {
                case 'Umesp':
                    array_push($umesp_file, $row);
                    break;

                case 'Unimep':
                    array_push($unimep_file, $row);
                    break;

                case 'Izabela':
                    array_push($izabela_file, $row);
                    break;

                case 'Granbery':
                    array_push($granbery_file, $row);
                    break;

                case 'Fames':
                    array_push($fames_file, $row);
                    break;
                    
                case 'Ipa':
                    array_push($ipa_file, $row);
                    break;
            }
        }

        $this->clearStorage($storage_path);

        $file_list = [];

        if(count($umesp_file) > 0)
        {
            $this->storeFile($umesp_file, 'umesp-'.$tipo_de_acao.'-'.$date, $extension, public_path($storage_path));
            array_push($file_list, 'umesp-'.$tipo_de_acao.'-'.$date);
        }

        if(count($unimep_file) > 0)
        {
            $this->storeFile($unimep_file, 'unimep-'.$tipo_de_acao.'-'.$date, $extension, public_path($storage_path));
            array_push($file_list, 'unimep-'.$tipo_de_acao.'-'.$date);
        }
            
        if(count($izabela_file) > 0)
        {
            $this->storeFile($izabela_file, 'izabela-'.$tipo_de_acao.'-'.$date, $extension, public_path($storage_path));
            array_push($file_list, 'izabela-'.$tipo_de_acao.'-'.$date);
        }

        if(count($granbery_file) > 0)
        {
            $this->storeFile($granbery_file, 'granbery-'.$tipo_de_acao.'-'.$date, $extension, public_path($storage_path));
            array_push($file_list, 'granbery-'.$tipo_de_acao.'-'.$date);
        }

        if(count($fames_file) > 0)
        {
            $this->storeFile($fames_file, 'fames-'.$tipo_de_acao.'-'.$date, $extension, public_path($storage_path));
            array_push($file_list, 'fames-'.$tipo_de_acao.'-'.$date);
        }
            
        if(count($ipa_file) > 0)
        {
            $this->storeFile($ipa_file, 'ipa-'.$tipo_de_acao.'-'.$date, $extension, public_path($storage_path));
            array_push($file_list, 'ipa-'.$tipo_de_acao.'-'.$date);
        }

        return $file_list;

    }

    public function select($document_hash)
    {
        return Planilha::select('nome', 'email', 'celular', 'instituicao')
            ->where('documento', '=', $document_hash)
            ->orderBy('instituicao')
            ->orderBy('nome')
            ->get()
            ->toArray();
    }

    public function filtroEad($currentFile, $extension, $tipo_de_acao, $date, $storage_path)
    {

        $tipo_de_acao = str_replace('-a-distancia', '', $tipo_de_acao);
        $document_hash = md5($tipo_de_acao.$date.date('d-m-y h:i:s'));
        $headers = [];

        foreach($currentFile[0] as $header => $value)
            array_push($headers, $header);
        
        foreach($currentFile as $key_row => $row)
        {
            foreach($row as $key => $cell)
            {
                if(!($key == 'nome' || $key == 'e_mail' || $key == 'número' || $key == 'ddd'))
                {
                    unset($currentFile[$key_row][$key]);               
                }

                if($key == 'número')
                {
                    $currentFile[$key_row]['número'] = str_replace('-', '', $currentFile[$key_row]['ddd'].$currentFile[$key_row]['número']);
                    $currentFile[$key_row]['número'] = str_replace('(', '', $currentFile[$key_row]['número']);
                    $currentFile[$key_row]['número'] = str_replace(')', '', $currentFile[$key_row]['número']);
                    $currentFile[$key_row]['número'] = str_replace(' ', '', $currentFile[$key_row]['número']);              
                }
            }

            $planilha = new Planilha;
            $planilha->nome = $currentFile[$key_row]['nome'];
            $planilha->email = $currentFile[$key_row]['e_mail'];
            $planilha->celular = $currentFile[$key_row]['número'];
            $planilha->instituicao = 'EaD-UMESP';
            $planilha->documento = $document_hash;

            $planilha->save();
        }

        Session::put('zipName', "$tipo_de_acao-$date");

        $currentFile = $this->select($document_hash);

        
        $umesp_file = [];

        foreach($currentFile as $row)
        {
            array_push($umesp_file, $row);
        }

        $this->clearStorage($storage_path);

        $file_list = [];

        if(count($umesp_file) > 0)
        {
            $this->storeFile($umesp_file, 'ead-umesp-'.$tipo_de_acao.'-'.$date, $extension, public_path($storage_path));
            array_push($file_list, 'ead-umesp-'.$tipo_de_acao.'-'.$date);
        }

        return $file_list;
    }



}
