<?php

use Illuminate\Database\Seeder;

class produtos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'Racao chomp',
            'imagem' => 'racao01.jpg',
            'preco' => 30
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Racao xy',
            'imagem' => 'racao02.jpg',
            'preco' => 55
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Racao Mutante',
            'imagem' => 'racao03.jpg',
            'preco' => 28
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Racao PhpMaster',
            'imagem' => 'racao04.jpg',
            'preco' => 99
        ]);
        
        DB::table('produtos')->insert([
            'nome' => 'Vacina multiflex',
            'imagem' => 'vacina01.jpg',
            'preco' => 128
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Vacina anti-rabica',
            'imagem' => 'vacina02.jpg',
            'preco' => 250
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Osso de brinquedo',
            'imagem' => 'osso01.jpg',
            'preco' => 10
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Osso de verdade',
            'imagem' => 'osso02.jpg',
            'preco' => 10
        ]);
        
        
    }
}
