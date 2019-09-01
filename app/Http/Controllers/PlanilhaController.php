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

    public function load($file_path)
    {
        return Excel::load($file_path)->get();
    }

}
