<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            [
            'nome' => 'Gerente de Projetos',
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now()        
            
            ],
            [
            'nome'     => 'Desenvolvedor',
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now()                    
           ]
    ]);
    }
}
