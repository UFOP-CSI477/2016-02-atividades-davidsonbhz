<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $produtos = Produto::all();
        return view('produtos.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        //dd($request);
        $p = Produto::create($request->all());
        
        
        if ($request->file('imagem')->isValid()) {
            $fnome = $request->file('imagem')->getClientOriginalName();            
            $request->file('imagem')->move("img/", $fnome);
            
            Produto::where('id', $p->getKey())->update(array('imagem' => $fnome));
        }
        
        session()->flash('info', 'Produto inserido com sucesso!');
        return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto) {
        // dd($produto);
        $prod = Produto::find($produto->id);
        //echo "prod=". $prod;
        return view("produtos.show")->with('produto', $prod);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto) {
        $prod = Produto::find($produto->id);
        return view("produtos.edit")->with('prod', $prod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto) {
        
        $produto->preco = $request->get("preco");
        $produto->nome = $request->get("nome");
        
        if ($request->file('imagem')!=null && $request->file('imagem')->isValid()) {
            $fnome = $request->file('imagem')->getClientOriginalName();            
            $request->file('imagem')->move("img/", $fnome);
            
            $produto->nome = $fnome;
            die("xxxxx");
        }
        
        
        $produto->save();
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto) {
        //
    }

}
