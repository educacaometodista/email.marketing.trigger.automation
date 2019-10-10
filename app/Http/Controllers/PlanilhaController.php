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

    //

    public function filter($files, $extension, $instituicoes, $date, $storage_path)
    {
        $tipo_de_acao_da_instituicao = null;
        $lista = null;
        $listas_de_contatos = [];

        foreach ($files as $file) {
            $tipo_de_acao_da_instituicao = TipoDeAcaoDaInstituicao::findOrFail($file['tipo_de_acao_da_instituicao']);
            $lista = $this->getFilter($file['file_content']->toArray(), $extension, $tipo_de_acao_da_instituicao, $date, $storage_path);

            $listas_de_contatos[$tipo_de_acao_da_instituicao->instituicao->prefixo] = $lista;
        }

        return $listas_de_contatos;
    }

    public function getFilter($arrayFile, $extension, $tipo_de_acao_da_instituicao, $date, $storage_path)
    {
        //$filtro = $tipo_de_acao_da_instituicao->filtro;
        //array regra

        $filtro = 'return [
            "NOME" => "nome",
            "EMAIL" => "e_mail",
            "CELULAR" => "celular",
            "INSTITUICAO" => "instituição"
        ];';

        $filtro = eval($filtro);
        
        if($this->hasColumns($filtro, $arrayFile))
        {
            foreach ($arrayFile as $key_row => $row) {
                $arrayFile[$key_row] = $this->celular($filtro, $row);
                $arrayFile[$key_row] = $this->clearRow($filtro, $arrayFile[$key_row]);
            }

            if(array_key_exists('INSTITUICAO', $filtro))
                $arrayFile = $this->orderByColumn($filtro['INSTITUICAO'], $arrayFile);
    
            return $arrayFile;

        } else {
            Session::flash('danger', 'O formato do arquivo não é válido!');
            return back();
        }

        
    }

    public function celular($filtro, $row)
    {
        foreach($row as $key => $cell)
        {
            if($key == $filtro['CELULAR'])
            {
                $row[$filtro['CELULAR']] = str_replace('-', '', $row[$filtro['CELULAR']]);              
                $row[$filtro['CELULAR']] = str_replace('(', '', $row[$filtro['CELULAR']]);
                $row[$filtro['CELULAR']] = str_replace(')', '', $row[$filtro['CELULAR']]);
                $row[$filtro['CELULAR']] = str_replace(' ', '', $row[$filtro['CELULAR']]);

                if(array_key_exists('DDD', $filtro))
                    if(array_key_exists($filtro['DDD'], $row))
                        $row[$filtro['CELULAR']] = $row[$filtro['DDD']].$row[$filtro['CELULAR']];
                    
                if(strlen($row[$filtro['CELULAR']]) != 11)
                    $row[$filtro['CELULAR']] = '';            
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

    //
}
