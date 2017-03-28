<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Prova;
use App\ProvaItem;
use App\ProvaItemOpcao;

class ProvaController extends Controller {

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
        $pr = Prova::all()->sortBy('data');;
        return view('provas.index')->with('pr', $pr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            return view('provas.create');
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/p');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            Prova::create($request->all());
            session()->flash('info', 'Prova cadastrada!');
            return redirect('/p');
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/p');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $p = Prova::findOrFail($id);
        $dados = DB::select( DB::raw("SELECT pi.provaitem as pi, pi.ordemq AS questao, d.descricao AS disciplina,
          pi.enunciado AS enunciado, pi.resposta AS resposta, pi.valor AS valor, pr.tipo AS tipo, d.peso AS peso
          FROM provaitem AS pi
          INNER JOIN prova AS pr ON pi.prova = pr.prova
          INNER JOIN disciplina AS d ON pi.disciplina = d.disciplina
          WHERE pi.prova = :id ORDER BY pi.ordemq"), array( 'id' => $p->prova ));
        // dd($dados);
        return view('provas.show')->with('p', $p)->with('dados', $dados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            $p = Prova::findOrFail($id);
            $dataprova = date('Y-m-d', strtotime($p->data));
            $d = date('Y-m-d');

            if(strtotime($dataprova) > strtotime($d)) {
                return view('provas.edit')->with('p', $p);
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/p/' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id) {
         if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
             $p = Prova::find($id);
             $p->professor=$request->professor;
             $p->data=$request->data;
             $p->tipo=$request->tipo;
             $p->titulo=$request->titulo;
             $p->save();
             session()->flash('info', 'Prova atualizada!');;
             return redirect('/p');
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/p');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if(Auth::user()->grupo == 1) {
            $p = Prova::findOrFail($id);
            try{
                $p->delete();
            }
            catch (\Illuminate\Database\QueryException $ex){
                session()->flash('info', 'Prova não pode ser excluída!');
                return redirect('/p');
            }
            session()->flash('info', 'Prova excluída!');
            return redirect('/p');
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/p');
    }
}
