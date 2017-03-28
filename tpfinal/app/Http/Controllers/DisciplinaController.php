<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Disciplina;
class DisciplinaController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth',['except'=> 'index']);//so o index n precisa de login para ser acessado
    }
    */
    public function index()
    {
      $disciplinas = Disciplina::all();
      return view('disciplinas.index')->with('disciplinas', $disciplinas);

    }

    public function create()
    {
        return view('disciplinas.create');
    }

    public function store(Request $request)
    {
        Disciplina::create($request->all());
        session()->flash('info', 'Disciplina: inserida com sucesso!');
        return redirect('/disciplinas');
    }

    public function show($id)
    {
      $disciplina = Disciplina::find($id);
      return view('disciplinas.show')->with('disciplina', $disciplina);
    }

    public function edit($id)
    {
        $disciplina = Disciplina::find($id);
        return view('disciplinas.edit')->with('disciplina', $disciplina);
    }

    public function update(Request $request, $id)
    {
      $disciplina = Disciplina::find($id);
      $disciplina->descricao=$request->descricao;
      $disciplina->codigo=$request->codigo;
      $disciplina->peso=$request->peso;
      $disciplina->notamedia=$request->notamedia;
      $disciplina->ordem=$request->ordem;

      $disciplina->save();

      return redirect('/disciplinas');
    }


    public function destroy($id)
    {
        Disciplina::destroy($id);
        return redirect('/disciplinas');
    }
}
