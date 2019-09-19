<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Admin;

class EditController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function edit($id)
    {
        return view('admin.auth.edit', ['admin' => Admin::findOrfail($id)]);
    }

}
