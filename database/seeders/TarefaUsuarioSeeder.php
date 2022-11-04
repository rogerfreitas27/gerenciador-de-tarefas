<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Tarefa;
use App\Models\User;

class TarefaUsuarioSeeder extends Seeder{


/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefa_usuarios')->insert([

            [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()
                
                ],
                [
                    'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()    
               ]
               ,
                [
                    'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()         
               ],
               [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()        
              ],
              [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()       
             ]
             ,
              [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()     
             ]
             ,
              [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()     
             ]
             ,
              [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()       
             ]
             ,
              [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()       
             ],
             [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()    
            ]
            ,
             [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()    
            ] ,
            [
                'tarefa_id' => Tarefa::all()->random()->id,
                'user_id' =>User::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()       
           ]
        ]);
        
    }
}