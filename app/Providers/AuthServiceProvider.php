<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Service\TarefaService;
use App\Service\TarefaUsuarioService;


class AuthServiceProvider extends ServiceProvider
{
    





    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-menu-usuario',function($user){

                 if($user->tipo_usuario_id==1){ return true;  }
                
        });

        
       



             
    }
}
