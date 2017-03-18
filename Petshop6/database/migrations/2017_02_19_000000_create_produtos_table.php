<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('produtos');
        
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome'); 
            $table->string('imagem', 120);            
            $table->decimal('preco', 10, 2);            
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        
        
        DB::unprepared('alter table produtos modify id integer auto_increment');
        
        DB::table('produtos')->insert(
            array(
                'nome' => 'Coleira comum',
                'preco' => 22,
                'imagem' => 'coleira01.jpg'
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
        Schema::dropIfExists('produtos');
    }
}
