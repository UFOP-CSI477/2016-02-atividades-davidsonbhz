<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

use App\Produto;
use App\Carrinho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::get('/', function () {
    $produtos = Produto::all();

    if (Auth::check()) {
        return view('welcome')->with('produtos', $produtos);
    } else {

        return view('welcome')->with('produtos', $produtos);
    }
});

Route::get("/logout", function() {
    //session()->flush();
    Auth::logout();
    $produtos = Produto::all();
    return view('welcome')->with('produtos', $produtos);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/carrinho/remove/{id}',['uses' =>'CarrinhoController@remove'])->name('removecarrinho');

Route::get('/finalizacompra',['uses' =>'CarrinhoController@finalizacompra'])->name('finalizacompra');

Route::get('/itenscomprados',['uses' =>'CarrinhoController@itenscomprados'])->name('itenscomprados');

Route::get('/listausuarios',['uses' =>'UserController@listausuarios'])->name('listausuarios');

Route::get('/criausuario',['uses' =>'UserController@criausuario'])->name('criausuario');

Route::get('/profile',['uses' =>'UserController@verperfil'])->name('verperfil');

Route::get('/profileupdate',['uses' =>'UserController@atualizarperfil'])->name('profileupdate');


Route::resource('produtos', 'ProdutoController');

Route::resource('carrinho', 'CarrinhoController');



Route::get("/finaliza", function() {
    return view('carrinho.finaliza');
});
