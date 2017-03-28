<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvaItem extends Model
{
    protected $table = 'provaitem';
    protected $primaryKey = 'provaitem';
    protected $fillable = ['prova', 'disciplina', 'supervisor', 'enunciado', 'resposta', 'valor', 'status', 'ordemq'];
}
