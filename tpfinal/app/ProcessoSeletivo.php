<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessoSeletivo extends Model
{
    protected $table = 'processoseletivo';
    protected $primaryKey = 'processoseletivo';
    protected $fillable = ['prova', 'titulo', 'dataprova', 'hora', 'local', 'status', 'inicioinscricao',
        'terminoinscricao', 'envioemail', 'ano', 'periodo', 'qtdaprovados', 'iniciomatricula', 'fimmatricula', 'matriculaexcedente'];

    public function proc() {
    	return $this->belongsTo('App\CandidatoXProcesso');
  	}

}
