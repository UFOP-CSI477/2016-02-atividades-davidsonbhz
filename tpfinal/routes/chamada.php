<?php
Use App\Chamada;


Route::get('/chamadas/index-aluno','ChamadaController@indexAluno');

Route::resource('/chamadas','ChamadaController');
