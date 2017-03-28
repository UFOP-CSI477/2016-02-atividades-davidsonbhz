<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidato';
    protected $primaryKey = 'candidato';

    protected $fillable = ['nome', 'endereco', 'bairro', 'cidade', 'cep', 'rg', 'nascimento', 'escolaEnsinoFundamental',
      'escolaEnsinoMedio', 'celular', 'datareg', 'status', 'sexo', 'estadocivil', 'nomepai', 'nomemae', 'tipoensinomedio', 'codigo', 'ip',
      'comprovante', 'possuideficiencia', 'tipodeficiencia'];

    protected $hidden = ['remember_token'];

    public function proc() {
    	return $this->belongsTo('App\CandidatoXProcesso');
  	}

}
