<?php

namespace App\Providers;

use App\DDD\Infrastructure\Query\Project\ProjectQuery;
use App\DDD\Infrastructure\Query\Project\ProjectQueryEloquent;
use Illuminate\Support\ServiceProvider;

class QueryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProjectQuery::class, ProjectQueryEloquent::class);
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
