<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('compras');
        
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade'); 
            $table->integer('produto_id'); 
            $table->integer('user_id'); 
            $table->date('data'); 
            $table->timestamps();
            $table->engine = 'InnoDB';
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
        
        
        
        /*
        Schema::table('compras', function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
