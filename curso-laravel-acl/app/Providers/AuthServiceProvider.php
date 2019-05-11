<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Produto;
use App\Policies\ProdutoPolicy;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //Produto::class => ProdutoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use($permission) {
                return $user->hasPermission($permission);
            });
        }

        //executa antes da lógica acima. Com isso permitimos acesso root ao nosso sistema.
        Gate::before(function(User $user, $permission) {
            if($user->hasAnyRoles('admin')) {
                return true;
            }
        });
    }
}
