<?php
Use App\Aluno;

Route::get('/alunos/home-alunos', function () {
    return view('alunos/home-alunos');
});

Route::resource('/alunos','AlunoController');
