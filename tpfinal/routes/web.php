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

// Route::get('/', function () { return view('/welcome'); });
Route::get('/', function () { return redirect('/home'); });

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/usuarios', 'UsuarioController');

include "candidato.php";
include "aluno.php";
include "professor.php";
include "admin.php";
include "chamada.php";
include "gabarito.php";
include "grade.php";
include "disciplina.php";
include "turma.php";
