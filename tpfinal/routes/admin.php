<?php

Route::get('/listausuarios',['uses' =>'UsuarioController@listausuarios'])->name('listausuarios');

Route::get('/criausuario',['uses' =>'UsuarioController@criausuario'])->name('criausuario');

Route::get('/profile',['uses' =>'UsuarioController@verperfil'])->name('verperfil');

Route::get('/profileupdate',['uses' =>'UsuarioController@atualizarperfil'])->name('profileupdate');

Route::get('/admin/profile/{id}',['uses' =>'UsuarioController@verperfil'])->name('verperfil');

Route::get('/admin/grupos/{id}',['uses' =>'UsuarioController@vergrupos'])->name('vergrupos');

Route::get('/admin/grupos/sair/{id}/{gid}',['uses' =>'UsuarioController@saigrupo'])->name('saigrupo');

Route::get('/admin/grupos/primario/{id}/{gid}',['uses' =>'UsuarioController@defineprimario'])->name('defineprimario');

Route::get('/admin/grupos/ingressar/{id}/{gid}',['uses' =>'UsuarioController@ingressar'])->name('ingressar');

Route::get('/admin/candidatos',['uses' =>'AdminController@listarcandidatos'])->name('listarcandidatos');

Route::get('/admin/professores',['uses' =>'AdminController@listarprofessores'])->name('listarprofessores');

Route::get('/admin/professor/disciplinas/{id}',['uses' =>'AdminController@listardisciplinaprofessor'])->name('listardisciplinaprofessor');

Route::get('/admin/professor/disciplinas/associar/{id}/{dis}',['uses' =>'AdminController@associardisciplinaprofessor'])->name('associardisciplinaprofessor');

Route::get('/admin/professor/disciplinas/desassociar/{id}/{dis}',['uses' =>'AdminController@desassociardisciplinaprofessor'])->name('desassociardisciplinaprofessor');


Route::resource('/p', 'ProvaController');
Route::resource('/pi', 'ProvaItemController');
Route::resource('/q', 'ProvaItemController');
Route::resource('/ps', 'ProcessoSeletivoController');
