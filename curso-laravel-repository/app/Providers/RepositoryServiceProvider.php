<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CategoriaRepositoryInterface,
    ProdutoRepositoryInterface,
    ChartRepositoryInterface
};


use Illuminate\Support\ServiceProvider;

use App\Repositories\Core\Eloquent\{
    EloquentProdutoRepository,
    EloquentCategoriaRepository,
    EloquentChartRepository
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
