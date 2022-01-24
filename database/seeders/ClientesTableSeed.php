<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ClientesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // \App\Models\User::factory(10)->create();
        // \App\Models\Livro::factory()->count(50)->create(); 

        \App\Models\Cliente::factory()->count(10)->create()->each(function ($user) {
            $user->telefones()->saveMany(\App\Models\Telefone::factory()->count(3)->create(['cliente_id'=>$user->id])->make());
        });
        
    }

    
}
