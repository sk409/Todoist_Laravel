<?php

namespace App\Providers;

use App\DDD\Presentation\Project\Query\ProjectQuery;
use App\DDD\Presentation\Project\Query\ProjectQueryEloquent;
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
