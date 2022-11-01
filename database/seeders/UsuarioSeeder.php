<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;
use App\Models\Usuario;
use Carbon\Carbon;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
            'nome' => 'João Alves',
            'email'=>'joaoalves@email',
            'password'=>bcrypt('12345678'),
            'tipo_usuario_id' =>TipoUsuario::all()->random()->id,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now()
            
            ],
            [
                'nome' => 'Paula Marques',
                'email'=>'paulamarquess@email',
                'password'=>bcrypt('12345678'),
                'tipo_usuario_id'=>TipoUsuario::all()->random()->id ,
                'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now()        
           ]
           ,
            [
                'nome' => 'Adriano Gonçalves',
                'email'=>'adrianogoncalves@gmail.com',
                'password'=>bcrypt('12345678'),
                'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()           
           ],
           [
               'nome' => 'Julio Fonseca',
               'email'=>'juliofonseca@gmail.com',
               'password'=>bcrypt('12345678'),
               'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
               'created_at'=>Carbon::now(),
               'updated_at' =>Carbon::now()        
          ],
          [
              'nome' => 'Fernando Pessoa',
              'email'=>'fernandopessoa@gmail.com',
              'password'=>bcrypt('12345678'),
              'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
              'created_at'=>Carbon::now(),
              'updated_at' =>Carbon::now()        
         ]
         ,
          [
              'nome' => 'Ana Maria',
              'email'=>'ana@gmail.com',
              'password'=>bcrypt('12345678'),
              'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
              'created_at'=>Carbon::now(),
              'updated_at' =>Carbon::now()        
         ]
         ,
          [
              'nome' => 'Luiz Alves',
              'email'=>'luizalves@gmail.com',
              'password'=>bcrypt('12345678'),
              'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
              'created_at'=>Carbon::now(),
              'updated_at' =>Carbon::now()        
         ]
         ,
          [
              'nome' => 'Caio Andrade',
              'email'=>'caioandrade@gmail.com',
              'password'=>bcrypt('12345678'),
              'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
              'created_at'=>Carbon::now(),
              'updated_at' =>Carbon::now()        
         ]
         ,
          [
              'nome' => 'Gustavo Alves',
              'email'=>'gustavoalves@gmail.com',
              'password'=>bcrypt('12345678'),
              'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
              'created_at'=>Carbon::now(),
              'updated_at' =>Carbon::now()        
         ],
         [
             'nome' => 'Bruno de Souza',
             'email'=>'brunosouza@gmail.com',
             'password'=>bcrypt('12345678'),
             'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
             'created_at'=>Carbon::now(),
             'updated_at' =>Carbon::now()        
        ]
        ,
         [
             'nome' => 'Emily Duarte',
             'email'=>'emilyduarte@gmail.com',
             'password'=>bcrypt('12345678'),
             'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
             'created_at'=>Carbon::now(),
             'updated_at' =>Carbon::now()        
        ] ,
        [
            'nome' => 'Raissa Oliveira',
            'email'=>'raissaoliveira@gmail.com',
            'password'=>bcrypt('12345678'),
            'tipo_usuario_id'=>TipoUsuario::all()->random()->id,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now()        
       ]
    ]);
    }
}
