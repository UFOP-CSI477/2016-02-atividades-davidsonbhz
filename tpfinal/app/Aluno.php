<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';
    protected $primaryKey = 'aluno';

    public function turma() {
      return $this->belongsTo('App\Turma');
    }
}
