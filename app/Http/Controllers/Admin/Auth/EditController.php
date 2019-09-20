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
        if($id == Auth::user()->id)
            return view('admin.auth.edit', ['admin' => Admin::findOrfail($id)]);
        else
            return redirect()->route('admin.home');

    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|min:2|max:255|string',
            'password' => 'required|min:6|max:255|string',
            'foto_de_perfil' => 'required|min:8|max:255|string'
        ]);

        $admin = Admin::findOrFail($id)->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'foto_de_perfil' => $request->foto_de_perfil,
        ]);

        return redirect()->route('admin.edit', compact('admin'))
            ->with('success', 'Informações alteradas com sucesso!');

        
    }

}
