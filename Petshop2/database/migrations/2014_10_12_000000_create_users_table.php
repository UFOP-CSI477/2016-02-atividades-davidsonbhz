<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('tipo', array('admin', 'operador', 'cliente'));
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        
        DB::table('users')->insert(
            array(
                'name' => 'Davidson',
                'email' => 'davidsonbhz@gmail.com',
                'password' => md5('123'),
                'tipo' => 'admin'
            )
        );
        
        DB::unprepared('alter table users modify id integer auto_increment');
        //DB::raw('alter table users modify id integer');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
