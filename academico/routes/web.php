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

use App\Disciplina;

Route::get('/', function () {
    
    $d = Disciplina::all();
    
    return view('welcome')->with('disciplinas', $d);
});

Route::get('admin', function () {
    return view('admin.admin_template');
});

Route::resource('disciplinas', 'DisciplinaController');
Route::resource('cidades', 'CidadeController');
Route::resource('alunos', 'AlunoController');

