<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $fillable = ['nome','email', 'rua', 'numero', 'cep', 'cidade_id'];
    
}
