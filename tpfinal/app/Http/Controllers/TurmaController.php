<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Turma;
class TurmaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth',['except'=> 'index']);//so o index n precisa de login para ser acessado
  }
     public function index()
     {
       //$turmas = Turma::all();
       $lista = DB::select(DB::raw("select t.*, count(ut.usuario) alunos from turma t inner join usuarioxturma ut on t.turma=ut.turma group by ut.turma"));
        
       return view('turmas.index')->with('turmas', $lista);
     }

     public function create()
     {
       return view('turmas.create');
     }

     public function store(Request $request)
     {
         Turma::create($request->all());
         return redirect('/turmas');
     }


     public function show($id)
     {
       $turma = Turma::find($id);
       return view('turmas.show')->with('turma', $turma);
     }

     public function edit($id)
     {
         $turma = Turma::find($id);
         return view('turmas.edit')->with('turma', $turma);
     }


     public function update(Request $request, $id)
     {
       $turma = Turma::find($id);
       $turma->diasdasemana=$request->diasdasemana;
       $turma->horario=$request->horario;
       $turma->datainicio=$request->datainicio;
       $turma->datatermino=$request->datatermino;
       $turma->capacidade=$request->capacidade;
       $turma->sala=$request->sala;
       $turma->status=$request->status;
       $turma->notamedia=$request->notamedia;
       $turma->descricao=$request->descricao;
       $turma->save();

       return redirect('/turmas');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
        Turma::destroy($id);
         return redirect('/turmas')->with('message','Turma excluída!');
     }
     
     
     public function listalunos($id) {
       $turma = Turma::find($id);
       $lista = DB::select(DB::raw("select u.* from usuario u inner join usuarioxturma ut on ut.usuario=u.usuario and ut.turma=? order by nome"),[$id]);
       
       return view('turmas.alunos')->with('alunos', $lista)->with('turma', $turma);
         
     }
     
}
