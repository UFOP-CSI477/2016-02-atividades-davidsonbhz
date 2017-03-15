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

use App\Evento;
use App\User;

Route::get('/', function () {
    $results = Evento::all();
    return view('welcome')->with('eventos', $results);
});


Auth::routes();

Route::get('/home', 'HomeController@index');
#Route::get('/atleta', 'AtletaController@index');

Route::get('/atleta/inscrever', function() {
    $eventos = Evento::all();
    return view('atleta.inscrever')->with('eventos', $eventos);
});

Route::get('/atleta/relatorio', function() {
    //$eventos = Evento::all();
    
    $results = DB::select(DB::raw("SELECT * FROM registros r inner join eventos e on r.evento_id=e.id WHERE r.atleta_id = :usuario"), array(
                'usuario' => Auth::id()));
    
    //dd($results);
    return view('atleta.relatorio')->with('eventos', $results);
});

Route::get("/logout", function(){
    //session()->flush();
    Auth::logout();
    return redirect("/");
    
});

Route::get("/admin", function(){
    $eventos = Evento::all();
    $inscricoes = DB::select(DB::raw("SELECT * FROM registros r inner join eventos e on r.evento_id=e.id inner join users a on a.id=r.atleta_id"), array(
                'usuario' => Auth::id()));
    $atletas = User::orderBy('name')->get();
    
    //dd($results);
    return view('eventos.index')->with('eventos', $eventos)->with('inscricoes', $inscricoes)->with('atletas', $atletas);

    
});



Route::resource('/atleta', 'AtletaController');
