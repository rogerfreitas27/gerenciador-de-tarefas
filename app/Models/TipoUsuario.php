<?php

namespace App\Models;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
   
    use HasFactory;

    protected $fillable = [
        'nome'        
    ];

    public function relTipoUsuario()
    {
      // return $this->hasOne(Usuario::class,'tipo_usuario_id','id');
          return $this->belongsTo(Usuario::class,'tipo_usuario_id','id');
     
    }
}
