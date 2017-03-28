<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ProcessoSeletivo;
use App\Prova;
use App\ProvaItem;
use App\ProvaItemOpcao;

class ProcessoSeletivoController extends Controller {

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
        $ps = ProcessoSeletivo::all();
        return view('processosseletivo.index')->with('ps', $ps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            $provas = DB::select( DB::raw("SELECT *FROM prova WHERE tipo = 'PROVA'" ));
            return view('processosseletivo.create')->with('provas', $provas);
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/ps');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            ProcessoSeletivo::create($request->all());
            session()->flash('info', 'Processo seletivo cadastrado!');
            return redirect('/ps');
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/ps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            $p = ProcessoSeletivo::findOrFail($id);
            return view('processosseletivo.show')->with('p', $p);
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/ps');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            $ps = ProcessoSeletivo::findOrFail($id);
            $provas = Prova::all();
            return view('processosseletivo.edit')->with('ps', $ps)->with('provas', $provas);
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/ps');
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
             $p = ProcessoSeletivo::find($id);
             $p->prova=$request->prova;
             $p->titulo=$request->titulo;
             $p->dataprova=$request->dataprova;
             $p->hora=$request->hora;
             $p->local=$request->local;
             $p->status=$request->status;
             $p->inicioinscricao=$request->inicioinscricao;
             $p->terminoinscricao=$request->terminoinscricao;
             $p->envioemail=$request->envioemail;
             $p->ano=$request->ano;
             $p->periodo=$request->periodo;
             $p->qtdaprovados=$request->qtdaprovados;
             $p->iniciomatricula=$request->iniciomatricula;
             $p->fimmatricula=$request->fimmatricula;
             $p->matriculaexcedente=$request->matriculaexcedente;
             $p->save();
             session()->flash('info', 'Processo seletivo atualizado!');;
             return redirect('/ps');
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/ps');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
        if(Auth::user()->grupo == 1) {
            $ps = ProcessoSeletivo::findOrFail($id);
            $ps->delete();
            session()->flash('info', 'Processo seletivo excluído!');
            return redirect('/ps');
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/ps');
     }

}
