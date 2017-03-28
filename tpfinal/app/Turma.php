<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model {

    protected $table = 'turma';
    protected $primaryKey = 'turma';
    protected $fillable = ['diasdasemana', 'horario', 'datainicio', 'datatermino', 'capacidade', 'sala', 'status', 'descricao'];

}

