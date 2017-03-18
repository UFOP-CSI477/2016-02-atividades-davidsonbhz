<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
   
    protected $table = 'compras';
    protected $fillable = ['quantidade','produto_id', 'user_id', 'data'];
    
}
