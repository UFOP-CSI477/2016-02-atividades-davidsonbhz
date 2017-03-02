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
use App\User;


Route::get('/', function () {
    $produtos = Produto::all();
    
    return view('welcome')->with('produtos', $produtos);;
});


Route::get('/clientes', function() {
    $clientes = User::all();
    return view('clientes.index')->with('clientes', $clientes);
});

Route::get('admin', function () {
    return view('admin.admin_template');
});

Route::resource('produtos', 'ProdutoController');
//Route::resource('usuarios', 'UsuariosController');
//Route::resource('vendas', 'VendasController');
