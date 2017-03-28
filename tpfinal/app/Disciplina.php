<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplina';
    protected $primaryKey = 'disciplina';
    protected $fillable = ['descricao', 'codigo', 'notamedia', 'peso', 'ordem'];
}
