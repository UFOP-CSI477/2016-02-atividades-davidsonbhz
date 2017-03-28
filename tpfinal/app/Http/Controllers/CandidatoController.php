<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Candidato;
use App\Usuario;
use App\CandidatoXProcesso;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class CandidatoController extends Controller
{
  /*  public function __construct()
    {
       $this->middleware('auth',['except'=> 'index']);
    }
  */
    public function index()
    {
      $candidatos = Candidato::all();
      return view('candidatos.index')->with('candidatos', $candidatos);
    }

    public function meusprocessos($id)
    {
      if(Auth::check()) {
        $id_ = DB::select( DB::raw("SELECT c.candidato AS cand FROM candidato AS c
          INNER JOIN usuario AS u ON c.email = u.email
          WHERE u.usuario = :id"), array( 'id' => Auth::user()->usuario ));
        $id = $id_[0]->cand;

        $candidato = Candidato::find($id);
        
        $var = DB::select( DB::raw("select p.*, c.comprovante, c.status from processoseletivo p inner join 
          candidatoxprocesso cp on p.processoseletivo = cp.processoseletivo inner join
          candidato c on c.candidato = cp.candidato and 
          cp.candidato = ?"), [$candidato->candidato]);


        //dd($var);
        return view('candidatos.meusprocessos')->with('var', $var);



      }
    }

    public function create()
    {
      return view('candidatos.create');
    }

    public function inscrever(Request $request)
    {
      
      if(Auth::check()) {
        $id_ = DB::select( DB::raw("SELECT c.candidato AS cand FROM candidato AS c
          INNER JOIN usuario AS u ON c.email = u.email
          WHERE u.usuario = :id"), array( 'id' => Auth::user()->usuario ));
        $id = $id_[0]->cand;

        $candidato = Candidato::find($id);
        $processoseletivo = $request->processoseletivo;

       
        DB::statement("insert into candidatoxprocesso values (?,?)", [$candidato->candidato, $processoseletivo]);
        
        return redirect('/meusprocessos/{$candidato}');
      }
    }

    public function store(Request $request)
    {
      // dd($request);
      try{
          if(strlen($request->senha) >= 6 && strcasecmp($request->senha, $request->senhaconfirm) == 0) {
              $u = new Usuario();
              $u->grupo=5;
              $u->nome=$request->nome;
              $u->sexo=$request->sexo;
              $u->cpf=$request->cpf;
              $u->datanascimento=$request->nascimento;
              $u->rg=$request->rg;

              date_default_timezone_set('America/Sao_Paulo');
              $date = date('Y-m-d H:i');

              $u->ultimoacesso=$date;
              $u->datacadastro=$date;
              $u->email=$request->email;
              $u->password=bcrypt($request->senha);
              $u->status="ATIVO";
              $u->save();

              $c = new Candidato();
              $c->nome=$request->nome;
              $c->endereco=$request->endereco;
              $c->bairro=$request->bairro;
              $c->cidade=$request->cidade;
              $c->cep=$request->cep;
              $c->cpf=$request->cpf;
              $c->rg=$request->rg;
              $c->nascimento=$request->nascimento;
              $c->escolaEnsinoFundamental=$request->escolaensinofundamental;
              $c->escolaEnsinoMedio=$request->escolaensinomedio;
              $c->email=$request->email;
              $c->telefone=$request->telefone;
              $c->celular=$request->celular;
              $c->datareg=$date;
              $c->status="ATIVO";
              $c->sexo=$request->sexo;
              $c->estadocivil=$request->estadocivil;
              $c->nomepai=$request->nomedopai;
              $c->nomemae=$request->nomedamae;
              $c->tipoensinomedio=$request->tipoensinomedio;
              $c->possuideficiencia=$request->possuideficiencia;
              $c->tipodeficiencia=$request->descricaodeficiencia;
              $c->save();

              session()->flash('info', 'Candidato cadastrado!');
          } else {
              session()->flash('info', 'Senha inválida!');
              return redirect('/candidatos/create');
          }
      }
      catch (\Illuminate\Database\QueryException $ex){
          session()->flash('info', 'Erro ao cadastrar!');
          return redirect('/candidatos/create');
      }

      return redirect('/');
    }

    public function show($id)
    {
      $candidato = Candidato::find($id);
      return view('candidatos.show')->with('candidato', $candidato);
    }

    public function edit($id)
    {
      $candidato=Candidato::find($id);
      return view('produtos.edit')->with('produto', $produto);
    }

    public function update(Request $request, $id)
    {
      $candidatos = Candidato::find($id);
      $candidatos->nome = $request->nome;
      $candidatos->endereco = $request->endereco;
      $candidatos->bairro = $request->bairro;
      $candidatos->cidade = $request->cidade;
      $candidatos->cep = $request->cep;
      $candidatos->save();

      $u = DB::select( DB::raw("SELECT *FROM usuario AS u WHERE u.email = :email"), array( 'email' => $request->email ));
      $u->nome=$request->nome;

      date_default_timezone_set('America/Sao_Paulo');
      $date = date('Y-m-d H:i');

      $u->ultimoacesso=$date;
      $u->password=bcrypt($request->senha);
      $u->save();

      return redirect('/candidatos');
    }

    public function destroy($id)
    {
      Candidato::destroy($id);
      return redirect('/candidatos');
    }
}
