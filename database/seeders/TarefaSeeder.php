<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Tarefa;
use App\Models\Projeto;
class TarefaSeeder extends Seeder{


/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas')->insert([

            [
                'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()
                
                ],
                [
                    'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()      
               ]
               ,
                [
                  'nome' => 'Criar cadastro ',
                  'descricao'=>'Cria cadastro ',
                    'status'=>'Em andamento',
                    'projeto_id' =>Projeto::all()->random()->id ,
                    'created_at'=>Carbon::now(),
                    'updated_at' =>Carbon::now()          
               ],
               [
                'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()        
              ],
              [
                'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()       
             ]
             ,
              [
                'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()      
             ]
             ,
              [
                'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()       
             ]
             ,
              [
                'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()        
             ]
             ,
              [
                'nome' => 'Criar cadastro ',
                'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()        
             ],
             [
              'nome' => 'Criar cadastro ',
              'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()      
            ]
            ,
             [
              'nome' => 'Criar cadastro ',
              'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()     
            ] ,
            [
              'nome' => 'Criar cadastro ',
              'descricao'=>'Cria cadastro ',
                'status'=>'Em andamento',
                'projeto_id' =>Projeto::all()->random()->id ,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()       
           ]
        ]);
        
    }
}