<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->double('preco');
            $table->date('data');            
            $table->timestamps();
        });
        
        DB::unprepared('alter table eventos modify id integer auto_increment');
        
        DB::table('eventos')->insert(
            array(
                'nome' => 'Corrida em volta da lagoa',
                'preco' => 22,
                'data' => '2017-05-05'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
