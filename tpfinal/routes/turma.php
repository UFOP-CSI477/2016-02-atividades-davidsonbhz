<?php
Use App\Turma;


Route::resource('/turmas','TurmaController');

Route::get('/listalunos/{id}',['uses' =>'TurmaController@listalunos'])->name('listalunos');
