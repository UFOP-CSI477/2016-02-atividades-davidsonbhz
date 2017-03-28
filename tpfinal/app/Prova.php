<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $table = 'prova';
    protected $primaryKey = 'prova';
    protected $fillable = ['professor', 'data', 'tipo', 'titulo'];
}
