<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Usuario;

class UsuarioController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::user()->grupo == 1) {
            $usuarios = Usuario::all();
            return view('usuarios.index')->with('usuarios', $usuarios);
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Auth::user()->grupo == 1) {
          return view('usuarios.create');
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            if (Auth::user()->grupo == 1) {
                $u = new Usuario();
                $u->grupo=5;
                $u->nome=$request->nome;
                $u->sexo=$request->sexo;
                $u->cpf=$request->cpf;
                $u->datanascimento=$request->datanascimento;
                $u->rg=$request->rg;
                $d=date('Y-m-d');
                $u->ultimoacesso=$d;
                $u->datacadastro=$d;
                $u->email=$request->email;
                $u->password=bcrypt("123456");
                $u->status="ATIVO";
                $u->remember_token=$request->token;
                $u->save();
                $request->session()->flash('info', "Usuário cadastrado!");
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            session()->flash('info', 'Erro ao cadastrar!');
        }
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Auth::user()->grupo == 1) {
            $usuario = Usuario::findOrFail($id);
            return view('usuarios.edit')->with('usuario', $usuario);
        }
        if ($id == Auth::user()->usuario) {
            $usuario = Usuario::findOrFail($id);
            return view('usuarios.edit')->with('usuario', $usuario);
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Auth::user()->grupo == 1) {
            $usuario = Usuario::findOrFail($id);
            return view('usuarios.edit')->with('usuario', $usuario);
        }
        if ($id == Auth::user()->usuario) {
            $usuario = Usuario::findOrFail($id);
            return view('usuarios.edit')->with('usuario', $usuario);
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

    }

    public function verperfil() {
        return view('usuarios.edit');
    }

    public function atualizarperfil(Request $request) {
        $user = Usuario::findOrFail($request->usuario);
        if ($request->file('foto') != null && $request->file('foto')->isValid()) {
            $id = $user->usuario;
            $fnome = "/perfil/user_$id.jpg"; // $request->file('imagem')->getClientOriginalName();
            $user->foto = $fnome;
            $request->file('foto')->move("perfil/", $fnome);
        }
        $user->nome = $request->nome;
        $user->sexo = $request->sexo;
        $user->cpf = $request->cpf;
        $user->rg = $request->rg;
        $user->email = $request->email;
        $user->datanascimento = $request->datanascimento;

        try {
            $user->save();
            $request->session()->flash('info', "Dados atualizados!");
        } catch (\Illuminate\Database\QueryException $ex) {
            session()->flash('info', 'Erro ao atualizar!');
            return redirect('/usuarios/' . $user->usuario . '/edit');
        }

        if (Auth::user()->grupo == 1) {
            return redirect("/usuarios");
        }
        return redirect("/");
    }

    //visualiza os grupos de um usuario
    public function vergrupos($id) {
        $usuario = Usuario::findOrFail($id);
        $lista = DB::select(DB::raw("select g.grupo,g.nomegrupo,ug.usuario from grupo g inner join usuarioxgrupo ug on g.grupo=ug.grupo and ug.usuario=? union select gg.grupo,gg.nomegrupo,u.usuario from grupo gg inner join usuario u on u.grupo=gg.grupo and u.usuario=?"), [$id, $id]);
        $listanao = DB::select(DB::raw("select * from grupo where grupo not in (select g.grupo from grupo g inner join usuarioxgrupo ug on g.grupo=ug.grupo and ug.usuario=? union select gg.grupo from grupo gg inner join usuario u on u.grupo=gg.grupo and u.usuario=?)"), [$id, $id]);

        //dd($usuario);
        return view("usuarios.grupos")->with("lista", $lista)->with("usuario", $usuario)->with("listanao", $listanao);
    }

    public function saigrupo($id, $gid) {
        $usuario = Usuario::findOrFail($id);
        if ($gid == $usuario->grupo) {
            session()->flash('alert', 'Não é possível sair do grupo primário!');
        } else {
            $sql = "delete from usuarioxgrupo where usuario=? and grupo=?";
            DB::statement($sql, [$id, $gid]);
        }
        return redirect("/admin/grupos/$id");
    }

    public function defineprimario($id, $gid) {
        $usuario = Usuario::findOrFail($id);
        DB::statement("update usuario set grupo=? where usuario=?", [$gid, $id]);

        return redirect("/admin/grupos/$id");
    }

    public function ingressar($id, $gid) {

        $sql = "insert into usuarioxgrupo(usuario,grupo) values(?,?)";
        DB::statement($sql, [$id, $gid]);
        return redirect("/admin/grupos/$id");
    }

}
