<?php

use Illuminate\Database\Seeder;

class users extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//

        DB::table('users')->insert([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'type' => 1,
            'password' => bcrypt('123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type' => 2,
            'password' => bcrypt('123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'operador',
            'email' => 'operador@gmail.com',
            'type' => 3,
            'password' => bcrypt('123'),
        ]);
        
    
        
    }

}
