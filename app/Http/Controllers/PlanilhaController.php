<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Chumper\Zipper\Zipper;
use illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use App\Planilhas\Planilha;
use Session;

class PlanilhaController extends Controller
{
    public $filter_name;

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
        })->store($extension, public_path($storage_path));
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

    public function validator($subject, $currentFile)
    {
        $currentFile = is_object($currentFile) ? $currentFile->toArray() : (is_array($currentFile) ? $currentFile : null);

        $this->filter_name = ($subject == 'ausentes' || $subject == 'inscritos-parciais' || $subject == 'lembrete-de-prova' || $subject == 'aprovados-não-matriculados') ? 'Presencial' : 'Ead';
        if($this->filter_name == 'Ead')
        {
            

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

        return true;
    }

    public function getFilter($currentFile, $extension, $subject, $date, $storage_path)
    {
        if($this->filter_name == 'Ead')
        {
            $this->filtroEad($currentFile, $extension, $subject, $date, $storage_path);

        } elseif($this->filter_name == 'Presencial') {

            $this->filtroPresencial($currentFile, $extension, $subject, $date, $storage_path);

        }
    }

    public function filter($currentFile, $extension, $subject, $date, $storage_path)
    {

        if(!$this->validator($subject, $currentFile)) {
            return back();
        }

        $subject = strtolower($subject);
        
        $currentFile = $currentFile->toArray();
        
        $this->getFilter($currentFile, $extension, $subject, $date, $storage_path);
       
    }

    public function filtroPresencial($currentFile, $extension, $subject, $date, $storage_path)
    {
        $document_hash = md5($subject.$date.date('d-m-y h:i:s'));

        $headers = [];

        if(array_key_exists('nome', $currentFile[0]) && array_key_exists('e_mail', $currentFile[0]) && array_key_exists('celular', $currentFile[0]) && array_key_exists('instituição', $currentFile[0]))
        {

            foreach($currentFile[0] as $header => $value)
                array_push($headers, $header);
            
            foreach($currentFile as $key_row => $row)
            {
                
                foreach($row as $key => $cell)
                {
                    if($key == $headers[2])
                    {
                        $currentFile[$key_row][$key] = str_replace('-', '', $currentFile[$key_row][$key]);
                        $currentFile[$key_row][$key] = str_replace('(', '', $currentFile[$key_row][$key]);
                        $currentFile[$key_row][$key] = str_replace(')', '', $currentFile[$key_row][$key]);
                        $currentFile[$key_row][$key] = str_replace(' ', '', $currentFile[$key_row][$key]);

                        if(strlen($currentFile[$key_row][$key]) != 11)
                            if(isset($currentFile[$key_row][$key]))
                                $currentFile[$key_row][$key] = '';
                    }

                    if(!($key == $headers[0] || $key == $headers[1] || $key == $headers[2] || $key == $headers[17]))
                        unset($currentFile[$key_row][$key]);

                }
                
                $planilha = new Planilha;
                $planilha->nome = $currentFile[$key_row][$headers[0]];
                $planilha->email = $currentFile[$key_row][$headers[1]];
                $planilha->celular = ($currentFile[$key_row][$headers[2]]) ? $currentFile[$key_row][$headers[2]] : '';
                $planilha->instituicao = $currentFile[$key_row][$headers[17]];
                $planilha->documento = $document_hash;
                $planilha->save();
            }

            Session::put('zipName', "$subject-$date");

            $currentFile = Planilha::select('nome', 'email', 'celular', 'instituicao')
                                    ->where('documento', '=', $document_hash)
                                    ->orderBy('instituicao')
                                    ->orderBy('nome')
                                    ->get()
                                    ->toArray();

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
                $this->storeFile($umesp_file, 'umesp-'.$subject.'-'.$date, $extension, $storage_path);
                array_push($file_list, 'umesp-'.$subject.'-'.$date);
            }

            if(count($unimep_file) > 0)
            {
                $this->storeFile($unimep_file, 'unimep-'.$subject.'-'.$date, $extension, $storage_path);
                array_push($file_list, 'unimep-'.$subject.'-'.$date);
            }
                
            if(count($izabela_file) > 0)
            {
                $this->storeFile($izabela_file, 'izabela-'.$subject.'-'.$date, $extension, $storage_path);
                array_push($file_list, 'izabela-'.$subject.'-'.$date);
            }

            if(count($granbery_file) > 0)
            {
                $this->storeFile($granbery_file, 'granbery-'.$subject.'-'.$date, $extension, $storage_path);
                array_push($file_list, 'granbery-'.$subject.'-'.$date);
            }

            if(count($fames_file) > 0)
            {
                $this->storeFile($fames_file, 'fames-'.$subject.'-'.$date, $extension, $storage_path);
                array_push($file_list, 'fames-'.$subject.'-'.$date);
            }
                
            if(count($ipa_file) > 0)
            {
                $this->storeFile($ipa_file, 'ipa-'.$subject.'-'.$date, $extension, $storage_path);
                array_push($file_list, 'ipa-'.$subject.'-'.$date);
            }

            return $file_list;
        } else {

            return back()->with('message', 'Este documento não pode ser tratado!');
        }

    }

    public function filtroEad($currentFile, $extension, $subject, $date, $storage_path)
    {

        $subject = str_replace('-a-distancia', '', $subject);
        $document_hash = md5($subject.$date.date('d-m-y h:i:s'));
        $headers = [];

        foreach($currentFile[0] as $header => $value)
            array_push($headers, $header);
        
        foreach($currentFile as $key_row => $row)
        {
            foreach($row as $key => $cell)
                if(!($key == 'nome' || $key == 'e_mail' || $key == 'número' || $key == 'ddd'))
                        unset($currentFile[$key_row][$key]);               
            
            $planilha = new Planilha;
            $planilha->nome = $currentFile[$key_row]['nome'];
            $planilha->email = $currentFile[$key_row]['e_mail'];
            $planilha->celular = ($currentFile[$key_row]['número'] && $currentFile[$key_row]['ddd']) ? $currentFile[$key_row]['ddd'].$currentFile[$key_row]['número'] : '';
            $planilha->instituicao = 'EaD-UMESP';
            $planilha->documento = $document_hash;

            $planilha->save();
        }

        Session::put('zipName', "$subject-$date");

        $currentFile = Planilha::select('nome', 'email', 'celular', 'instituicao')
                                ->where('documento', '=', $document_hash)
                                ->orderBy('instituicao')
                                ->orderBy('nome')
                                ->get()
                                ->toArray();

        $umesp_file = [];

        foreach($currentFile as $row)
        {
            array_push($umesp_file, $row);
        }

        $this->clearStorage($storage_path);

        $file_list = [];

        if(count($umesp_file) > 0)
        {
            $this->storeFile($umesp_file, 'ead-umesp-'.$subject.'-'.$date, $extension, $storage_path);
            array_push($file_list, 'ead-umesp-'.$subject.'-'.$date);
        }

        return $file_list;
    }

}
