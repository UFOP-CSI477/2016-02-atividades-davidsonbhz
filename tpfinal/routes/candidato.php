<?php
Use App\Candidato;

Route::resource('/candidatos','CandidatoController');

Route::get('meusprocessos/{id}', ['uses' => 'CandidatoController@meusprocessos',
	'as' => 'candidatos.meusprocessos'
]);

Route::get('/inscrever', 'CandidatoController@inscrever');
