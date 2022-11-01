<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarefa;
class Usuario extends Model
{
   
    use HasFactory;
   

    protected $fillable = [
        'nome',
        'email',
        'password',
        'tipo_usuario_id'
    ];


      public function tarefaUsuario(){
        return $this->belongsToMany(Tarefa::class,'tarefa_usuarios','usuario_id','tarefa_id');
      }


      public function relTipoUsuario()   {
       return $this->hasOne(TipoUsuario::class,'id','tipo_usuario_id');
    } 


    

    


    
}
