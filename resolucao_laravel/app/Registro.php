<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';
    protected $fillable = ['atleta_id','evento_id', 'data', 'pago'];
    
    
}
