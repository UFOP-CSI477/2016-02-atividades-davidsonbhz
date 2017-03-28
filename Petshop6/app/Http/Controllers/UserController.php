<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function listausuarios() {
        $usuarios = User::all();
        return view('usuarios.index')->with("usuarios", $usuarios);
    }

    public function criausuario() {
        return view('usuarios.create');
    }

    public function verperfil($id) {
        return view('usuarios.edit');
    }

    public function atualizarperfil(Request $request) {

        $user = Auth::user(); // User::whereCompanyName($company_name)->firstOrFail();
        if ($request->file('imagem') !=null &&  $request->file('imagem')->isValid()) {
            $id = $user->id;
            $fnome = "user_$id.jpg";// $request->file('imagem')->getClientOriginalName();            
            $request->file('imagem')->move("img/", $fnome);
        }
        $user->fill($request->all());
        $user->save();
        $request->session()->flash('info', "Dados atualizados!");
        return redirect("/profile");
    }

}
