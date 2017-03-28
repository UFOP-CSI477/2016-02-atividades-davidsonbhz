<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatoXProcesso extends Model
{
    protected $table = 'candidatoxprocesso';
    protected $primaryKey = 'candidato,processoseletivo';
    protected $fillable = ['candidato', 'processoseletivo'];

    public function proc() {
    	return $this->belongsTo('App\ProcessoSeletivo');
  	}

  	public function cand() {
  		return $this->belongsTo('App\Candidato');
  	}

}
