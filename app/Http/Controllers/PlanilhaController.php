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

    public function filter($files, $extension, $date, $storage_path)
    {
        $tipo_de_acao_da_instituicao = null;
        $lista = null;
        $listas_de_contatos = [];

        foreach ($files as $file)
        {
            $tipo_de_acao_da_instituicao_id = $file['tipo_de_acao_da_instituicao'];

            if($tipo_de_acao_da_instituicao_id != 'all')
            {
                $tipo_de_acao_da_instituicao = TipoDeAcaoDaInstituicao::findOrFail($tipo_de_acao_da_instituicao_id);

                $lista = $this->getFilter($file['file_content']->toArray(), $extension, $tipo_de_acao_da_instituicao, $date, $storage_path);
                $listas_de_contatos[strtoupper($tipo_de_acao_da_instituicao->instituicao->prefixo)] = $lista;

            } else {

                $lista = $this->getFilter($file['file_content']->toArray(), $extension, 'all', $date, $storage_path);
                $listas_de_contatos['all'] = $lista;

            }            
        
        }

        return $listas_de_contatos;
    }

    public function getFilter($arrayFile, $extension, $tipo_de_acao_da_instituicao, $date, $storage_path)
    {
        if($tipo_de_acao_da_instituicao != 'all')
        {
            $filtro = $tipo_de_acao_da_instituicao->filtro->regra;

        } else {

            //Filtro padrão presencial (landing)
            $filtro = 'return [
                "NOME" => "nome",
                "EMAIL" => "e_mail",
                "CELULAR" => "celular",
                "INSTITUICAO" => "instituição"
            ];';

        }

        $filtro = eval($filtro);
        $newArrayFile = [];
        
        if($this->hasColumns($filtro, $arrayFile))
        {
            foreach ($arrayFile as $key_row => $row)
            {
                $arrayFile[$key_row] = $this->celular($filtro, $row);
                $arrayFile[$key_row] = $this->clearRow($filtro, $arrayFile[$key_row]);
            }


            if(array_key_exists('INSTITUICAO', $filtro))
                $arrayFile = $this->orderByColumn($filtro['INSTITUICAO'], $arrayFile);
            
                $arrayFile = $this->renameColumns($arrayFile, $filtro);

            //
            if(array_key_exists('INSTITUICAO', $filtro) && $tipo_de_acao_da_instituicao != 'all')
            {  
                foreach ($arrayFile as $key_row => $row)
                {
                    if($tipo_de_acao_da_instituicao->instituicao->prefixo == strtoupper($arrayFile[$key_row]['INSTITUICAO']))
                    {
                        $newArrayFile[$key_row] = $arrayFile[$key_row];
                    }
                }
                

            } elseif(!array_key_exists('INSTITUICAO', $filtro) && $tipo_de_acao_da_instituicao != 'all') {

                foreach ($arrayFile as $key_row => $row)
                {
                    $newArrayFile[$key_row] = $arrayFile[$key_row];
                }

            } else {
                foreach ($arrayFile as $key_row => $row)
                    $newArrayFile[strtoupper($arrayFile[$key_row]['INSTITUICAO'])][$key_row] = $arrayFile[$key_row];
            }

            return $newArrayFile;
            

        } else {

            return 'invalid';
        }
    }

    public function renameColumns($arrayFile, $filtro)
    {
        $newArrayFile = [];
        foreach ($arrayFile as $key_row => $row) {
            $new_row = [];
            foreach ($row as $key => $cell) {

                if(array_key_exists('NOME', $filtro))
                    if($key == $filtro['NOME'])
                        $new_row['NOME'] = $row[$filtro['NOME']];

                if(array_key_exists('EMAIL', $filtro))
                    if($key == $filtro['EMAIL'])
                        $new_row['EMAIL'] = $row[$filtro['EMAIL']];
                
                if(array_key_exists('CELULAR', $filtro))
                    if($key == $filtro['CELULAR'])
                        $new_row['CELULAR'] = $row[$filtro['CELULAR']];

                if($key == 'CELULAR')
                    $new_row['CELULAR'] = $row['CELULAR'];

                if(array_key_exists('INSTITUICAO', $filtro))
                        if($key == $filtro['INSTITUICAO'])
                            $new_row['INSTITUICAO'] = $row[$filtro['INSTITUICAO']];
            }
            array_push($newArrayFile, $new_row);
        }

        return $newArrayFile;
    }

    public function celular($filtro, $row)
    {
        foreach($row as $key => $cell)
        {
            if(array_key_exists('DDD', $filtro) && array_key_exists('NUMERO', $filtro))
            {

                if($key == $filtro['DDD'] || $key == $filtro['NUMERO'])
                {

                    if(array_key_exists($filtro['DDD'], $row) && array_key_exists($filtro['NUMERO'], $row))
                    {
                        $row['CELULAR'] = $row[$filtro['DDD']].$row[$filtro['NUMERO']];
                    }
                    
                    $row['CELULAR'] = str_replace('-', '', $row['CELULAR']);              
                    $row['CELULAR'] = str_replace('(', '', $row['CELULAR']);
                    $row['CELULAR'] = str_replace(')', '', $row['CELULAR']);
                    $row['CELULAR'] = str_replace(' ', '', $row['CELULAR']);
                        
                    if(strlen($row['CELULAR']) != 11)
                        $row['CELULAR'] = '';      

                }

            }  elseif(array_key_exists('CELULAR', $filtro)) {

                if($key == $filtro['CELULAR'])
                {
                    $row['CELULAR'] = str_replace('-', '', $row[$filtro['CELULAR']]);              
                    $row['CELULAR'] = str_replace('(', '', $row[$filtro['CELULAR']]);
                    $row['CELULAR'] = str_replace(')', '', $row[$filtro['CELULAR']]);
                    $row['CELULAR'] = str_replace(' ', '', $row[$filtro['CELULAR']]);
                        
                    if(strlen($row['CELULAR']) != 11)
                        $row['CELULAR'] = '';      
                }

            }
        }

        return $row;
    }

    public function clearRow($nomes_das_colunas, $row)
    {
        $removeColumn = false;
        $new_row = [];
        foreach($row as $key => $cell)
            if(in_array($key, $nomes_das_colunas) || $key == 'CELULAR')
                $new_row[$key] = $cell;

        return $new_row;
    }

    public function hasColumns($nomes_das_colunas, $arrayFile)
    {
       $hasColumns = false;
       foreach($nomes_das_colunas as $nome_da_coluna)
            foreach($arrayFile as $row)
                if(array_key_exists($nome_da_coluna, $row))
                    $hasColumns = true;
                else
                    $hasColumns = false;

       return $hasColumns;  
    }

    public function orderByColumn($nome_da_coluna, $arrayFile)
    {
        $valores_da_coluna = [];
        $newArrayFile = [];

        foreach ($arrayFile as $key_row => $row)
            if(!in_array($row[$nome_da_coluna], $valores_da_coluna))
                array_push($valores_da_coluna, $row[$nome_da_coluna]);

        sort($valores_da_coluna);

        foreach ($valores_da_coluna as $valor)
            foreach ($arrayFile as $key_row => $row)
                if($valor == $row[$nome_da_coluna])
                    array_push($newArrayFile, $row);

        return $newArrayFile;
    }
    
}
