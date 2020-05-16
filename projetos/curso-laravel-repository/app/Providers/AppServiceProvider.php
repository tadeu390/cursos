<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'admin.produtos.*',
            function ($view) {
                $view->with('categorias', Categoria::pluck('title', 'id')->toArray());

                $view->atributos = [];
                foreach (Categoria::pluck('title', 'id') as $key => $item) {
                    $view->atributos[$key] = ['title' => $item];
                }
            }
        );
    }
}
