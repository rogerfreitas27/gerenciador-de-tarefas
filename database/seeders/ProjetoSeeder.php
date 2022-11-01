<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            [
            'nome' => 'Crud - Escola lê mais',
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now()
            
            ],
            [
                'nome' => 'Crud - Meu banco',
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()        
           ]
           ,
            [
                'nome' => 'Vitrine Online',
                'created_at'=>Carbon::now(),
                'updated_at' =>Carbon::now()           
           ],
           [
               'nome' => 'Pet Shop',
               'created_at'=>Carbon::now(),
               'updated_at' =>Carbon::now()        
          ],
          [
              'nome' => 'Padaria',
              'created_at'=>Carbon::now(),
              'updated_at' =>Carbon::now()        
         ]
          ]);
    }
}
