<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Prova;
use App\ProvaItem;
use App\ProvaItemOpcao;
use App\Disciplina;

class ProvaItemController extends Controller {

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
        return redirect('p');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            $d = Disciplina::all();
            $provas = Prova::all();
            return view('questoes.create')->with('provas', $provas)->with('disciplinas', $d);
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
            $id = $request->prova;

            $pi = new ProvaItem;
            $pi->prova = $request->prova;
            $pi->disciplina = $request->disciplina;
            $pi->supervisor = $request->supervisor;
            $pi->enunciado = $request->enunciado;
            $pi->resposta = $request->resposta;
            $pi->valor = 1;
            $pi->status = "APROVADA";

            $ordemq = DB::select( DB::raw("SELECT max(pi.ordemq) AS n FROM provaitem AS pi WHERE prova = :id"), array( 'id' => $pi->prova ));
            $pi->ordemq = $ordemq[0]->n + 1;

            $pi->save();

            $provaitem = DB::select( DB::raw("SELECT max(pi.provaitem) AS m FROM provaitem AS pi WHERE prova = :id"), array( 'id' => $pi->prova ));

            $pio1 = new ProvaItemOpcao;
            $pio1->provaitem = $provaitem[0]->m;
            $pio1->descricao = "ALTERNATIVA A";
            $pio1->letra = "A";
            $pio1->save();

            $pio2 = new ProvaItemOpcao;
            $pio2->provaitem = $provaitem[0]->m;
            $pio2->descricao = "ALTERNATIVA B";
            $pio2->letra = "B";
            $pio2->save();

            $pio3 = new ProvaItemOpcao;
            $pio3->provaitem = $provaitem[0]->m;
            $pio3->descricao = "ALTERNATIVA C";
            $pio3->letra = "C";
            $pio3->save();

            $pio4 = new ProvaItemOpcao;
            $pio4->provaitem = $provaitem[0]->m;
            $pio4->descricao = "ALTERNATIVA D";
            $pio4->letra = "D";
            $pio4->save();

            $pio5 = new ProvaItemOpcao;
            $pio5->provaitem = $provaitem[0]->m;
            $pio5->descricao = "ALTERNATIVA E";
            $pio5->letra = "E";
            $pio5->save();

            session()->flash('info', 'Questão cadastrada!');
            return redirect('/p/'. $id);
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
        $dados = DB::select( DB::raw("SELECT p.data, pi.prova, pi.enunciado, pio.provaitemopcao, pio.provaitem, pio.descricao, pio.letra
          FROM provaitemopcao AS pio INNER JOIN provaitem AS pi ON pio.provaitem = pi.provaitem
          INNER JOIN prova AS p ON p.prova = pi.prova
          WHERE pio.provaitem = :id ORDER BY pio.letra"), array( 'id' => $id ));
          // dd($dados);
        return view('questoes.show')->with('dados', $dados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2) {
            $d = Disciplina::all();
            $provas = Prova::all();
            $pr = DB::select( DB::raw("SELECT *FROM provaitem AS pi INNER JOIN provaitemopcao AS pio ON pi.provaitem = pio.provaitem
              WHERE pio.provaitem = :id ORDER BY pio.letra"), array( 'id' => $id ));
            // dd($pr);
            $dat = DB::select( DB::raw("SELECT *FROM prova WHERE prova = :id"), array( 'id' => $pr[0]->prova ));
            $dataprova = date('Y-m-d', strtotime($dat[0]->data));
            $d = date('Y-m-d');
            if(strtotime($dataprova) > strtotime($d)) {
                return view('questoes.edit')->with('pr', $pr)->with('provas', $provas)->with('disciplinas', $d);
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/p');
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
            //  dd($request);
             $id = $request->pi;

             $pi = ProvaItem::find($id);;
             $pi->prova = $request->prova;
             $pi->disciplina = $request->disciplina;
             $pi->supervisor = $request->supervisor;
             $pi->enunciado = $request->enunciado;
             $pi->resposta = $request->resposta;
             $pi->valor = $request->valor;
             $pi->status = $request->status;
             $pi->ordemq = $request->ordemq;
             $pi->save();

             $pio1 = ProvaItemOpcao::find($request->pio1);
             $pio1->descricao = $request->a;
             $pio1->save();

             $pio2 = ProvaItemOpcao::find($request->pio2);
             $pio2->descricao = $request->b;
             $pio2->save();

             $pio3 = ProvaItemOpcao::find($request->pio3);
             $pio3->descricao = $request->c;
             $pio3->save();

             $pio4 = ProvaItemOpcao::find($request->pio4);
             $pio4->descricao = $request->d;
             $pio4->save();

             $pio5 = ProvaItemOpcao::find($request->pio5);
             $pio5->descricao = $request->e;
             $pio5->save();

             session()->flash('info', 'Questão atualizada!');
             return redirect('/pi/'. $id);
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
            $pi = ProvaItem::findOrFail($id);
            $id = $pi->prova;
            $pio = DB::select( DB::raw("SELECT *FROM provaitemopcao WHERE provaitem = :id"), array( 'id' => $pi->provaitem ));
            try{
                foreach ($pio as $p) {
                    $x = ProvaItemOpcao::findOrFail($p->provaitemopcao);
                    $x->delete();
                }
                $pi->delete();
            }
            catch (\Illuminate\Database\QueryException $ex){
                session()->flash('info', 'Questão não pode ser excluída!');
                return redirect('/p');
            }
            session()->flash('info', 'Questão excluída!');
            return redirect('/p/'. $id);
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/p');
    }
}
