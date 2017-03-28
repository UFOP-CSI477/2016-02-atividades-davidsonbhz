<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvaItemOpcao extends Model
{
    protected $table = 'provaitemopcao';
    protected $primaryKey = 'provaitemopcao';
    protected $fillable = ['provaitem', 'descricao', 'letra'];
}
