<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->integer('cidade_id');
            $table->string('cep');            
            $table->timestamps();
            $table->engine = 'InnoDB';
            
            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
        
        DB::unprepared('alter table alunos modify id integer auto_increment');
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
