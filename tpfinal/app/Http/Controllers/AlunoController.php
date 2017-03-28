<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Aluno;
use App\Turma;
class AlunoController extends Controller
{

    /*
    public function __construct()
     {
         $this->middleware('auth',['except'=> 'index']);//so o index n precisa de login para ser acessado
     }
    */
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index')->with('alunos', $alunos);
    }

    public function create()
    {
        $cidades = Cidade::all();
        return view('alunos.create')->with('cidades', $cidades);
    }


    public function store(Request $request)
    {
      Aluno::create($request->all());
      return redirect('/alunos');
    }

    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', ['aluno' => $aluno]);
    }


    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit')->with('aluno', $aluno);
    }


     public function update(Request $request, $id)
     {
       $aluno = Aluno::find($id);
       $aluno->nome=$request->nome;
       $aluno->cidade_id=$request->cidade_id;

       $aluno->save();

       return redirect('/alunos');
     }
    
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        return redirect('alunos')->with('message','Aluno excluído!');
    }
}
