<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\Chamada;
use App\Disciplina;
class ChamadaController extends Controller
{

    /*
    public function __construct()
     {
         $this->middleware('auth',['except'=> 'index']);//so o index n precisa de login para ser acessado
     }
    */
    public function index()
    {
        $chamadas = DB::select(DB::raw("select c.*, d.*, a.* from chamada c inner
        join disciplina d on c.disciplina=d.disciplina inner join aluno a on a.aluno=c.aluno"));
        return view('chamadas.index')->with('chamadas', $chamadas);
    }
    public function indexAluno()
    {
        $chamadas = DB::select(DB::raw("select c.status, c.data,date_format(c.data,'%d/%m/%Y') dataaula,
         d.descricao, a.aluno from chamada c inner join disciplina d on
         c.disciplina=d.disciplina inner join aluno a on a.aluno=c.aluno
         and c.status='A' and a.usuario=?"), [Auth::user()->usuario]);
        //dd(Auth::user());
        //dd($chamadas);

        return view('chamadas.index-aluno')->with('chamadas', $chamadas);
    }
    public function create()
    {
      //$alunos = Aluno::all();
      $disciplinas = Disciplina::all();
      //$data = $alunos + $disciplinas;
      $alunos = DB::select(DB::raw("select u.*,a.* from usuario u inner join aluno a
        on u.usuario=a.usuario where grupo=4"));
      //dd($alunos);
      return view('chamadas.create')->with('alunos', $alunos)->with('disciplinas',  $disciplinas);
    }


    public function store(Request $request)
    {
      $c = new Chamada();
      $c->data=$request->data;
      $c->status=$request->status;
      $c->disciplina=$request->disciplina;
      $c->aluno=$request->aluno;
      $c->justificativa=$request->justificativa;
      $c->anexo=$request->anexo;
      $c->observacao=$request->observacao;

      $c->save();
      return redirect('/chamadas');
    }


    public function show($id)
    {
        $chamada = Chamada::findOrFail($id);
        return view('chamadas.show', ['chamada' => $chamada]);
    }


    public function edit($id)
    {
        $chamada = Chamada::findOrFail($id);
        return view('chamadas.edit')->with('chamada', $chamada);
    }


     public function update(Request $request, $id)
     {
       $chamada = Chamada::find($id);
       $chamada->data=$request->data;
       $chamada->status=$request->status;
       $chamada->aluno=$request->aluno;
       $chamada->justificativa=$request->justificativa;
       $chamada->observacao=$request->observacao;
       $chamada->save();

       return redirect('/chamadas');
     }

    public function destroy($id)
    {
        $chamada = Chamada::findOrFail($id);
        $chamada->delete();
        return redirect('chamadas');
    }
}
