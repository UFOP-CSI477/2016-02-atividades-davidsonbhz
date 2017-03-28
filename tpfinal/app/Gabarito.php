<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gabarito extends Model
{
    protected $table = 'gabarito';
    protected $primaryKey = 'gabarito';

    public function candidato() {
      return $this->belongsTo('App\Candidato');
    }
    public function aluno() {
      return $this->belongsTo('App\Aluno');
    }
}
