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
        })->store($extension, storage_path($storage_path));
    }

    public function getFiles($storage_path)
    {
        return glob(storage_path("$storage_path*"));
    }

    public function clearStorage($path)
    {
        $filesystem = new Filesystem;
        $filesystem->cleanDirectory(public_path("storage/$path"));
        $filesystem->cleanDirectory(storage_path($path));
    }


}
