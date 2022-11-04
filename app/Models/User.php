<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Tarefa;
use App\Models\TipoUsuario;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'tipo_usuario_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
       
    ];

    
    
    
    public function tarefaUsuario(){
        return $this->belongsToMany(Tarefa::class,'tarefa_usuarios','usuario_id','tarefa_id');
      }


      public function relTipoUsuario()   {
       return $this->hasOne(TipoUsuario::class,'id','tipo_usuario_id');
    } 


}
