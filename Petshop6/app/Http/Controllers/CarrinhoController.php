<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Produto;
use App\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class CarrinhoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }
    
    public function itenscomprados() {
        $id = Auth::user()->id;
        
        
        $lista = DB::select(DB::raw("select p.id,p.nome,p.preco,date_format(c.data,'%d %b %y') datacompra,count(c.id) quantidade from produtos p inner join compras c on p.id=c.produto_id where c.user_id=$id group by p.id,c.data,p.preco,p.nome order by c.data"));
        
        
        return view("carrinho.itenscomprados")->with("lista", $lista);
        
    }

    public function finalizacompra() {
        $carrinho = Session::get('carrinho');
        $carrinho = str_replace("x", "", $carrinho);
        
        $a = explode(",", $carrinho);
        $qtds = array_count_values(explode(",", $carrinho));
        
        $carrinho = "";
        foreach ($a as $produto) {
            $c = new Compra();
            $c->quantidade = $qtds[$produto];
            $c->user_id = Auth::user()->id;
            $c->produto_id = $produto;
            $c->data = Carbon::now();
            $c->save();
        }
        Session::put('carrinho', "");
        return redirect("/home");
    }

    public function finaliza() {


        return view("carrinho.finaliza");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $carrinho = $request->session()->get('carrinho');

        $produto = $request->input("produto");
        $qtd = $request->input("quantidade");
        //$carrinho[$produto] = $qtd;
        //dd($carrinho);
        for ($i = 0; $i < $qtd; $i++) {

            if ($carrinho == "") {
                $carrinho = "x$produto" . "x";
            } else {
                $carrinho = $carrinho . ",x$produto" . "x";
            }
        }
        $request->session()->put('carrinho', $carrinho);

        $prod = Produto::find($produto);
        $desc = $prod->nome;

        $request->session()->flash('info', "Produto $desc adicionado ao carrinho");
        $produtos = Produto::all();
        //return view('welcome')->with('produtos', $produtos)->with("carrinho", $carrinho);
        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function show(Carrinho $carrinho) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrinho $carrinho) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {


        dd($request);
    }

    public function remove($id) {
        $carrinho = Session::get('carrinho');

        $a = explode(",", $carrinho);
        $carrinho = "";
        foreach ($a as $b) {
            if ($b != "x$id" . "x") {

                if ($carrinho == "") {
                    $carrinho = $b;
                } else {
                    $carrinho = $carrinho . ",$b";
                }
            }
        }


        //$carrinho = str_replace("x$id"."x", "", $carrinho);
        //$carrinho = str_replace(",,"."", "", $carrinho);

        Session::put('carrinho', $carrinho);
        return redirect("/finaliza");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrinho $carrinho) {
        //
    }

}
