<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CategoriaRepositoryInterface,
    ProdutoRepositoryInterface,
    ChartRepositoryInterface,
    UsuarioRepositoryInterface
};


use Illuminate\Support\ServiceProvider;

use App\Repositories\Core\Eloquent\{
    EloquentProdutoRepository,
    EloquentCategoriaRepository,
    EloquentChartRepository,
    EloquentUsuarioRepository
};

/* use App\Repositories\Core\QueryBuilder\{
    QueryBuilderCategoriaRepository
}; */

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProdutoRepositoryInterface::class,
            EloquentProdutoRepository::class
        );

        $this->app->bind(
            CategoriaRepositoryInterface::class,
            EloquentCategoriaRepository::class
            //QueryBuilderCategoriaRepository::class
        );

        $this->app->bind(
            ChartRepositoryInterface::class,
            EloquentChartRepository::class
        );

        $this->app->bind(
            UsuarioRepositoryInterface::class,
            EloquentUsuarioRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
