<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamada extends Model
{
    protected $table = 'chamada';
    protected $primaryKey = 'chamada';
    protected $fillable=['chamada','data', 'status', 'disciplina', 'aluno', 'justificativa', 'anexo', 'observacao'];

    public function disciplina() {
      return $this->belongsTo('App\Disciplina');
    }
    public function aluno() {
      return $this->belongsTo('App\Aluno');
    }
}
