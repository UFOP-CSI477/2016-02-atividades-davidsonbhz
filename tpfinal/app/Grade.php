<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';
    protected $primaryKey = 'grade';

    public function disciplina() {
      return $this->belongsTo('App\Disciplina');
    }

}
