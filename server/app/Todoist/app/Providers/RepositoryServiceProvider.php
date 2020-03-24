<?php

namespace App\Providers;

use App\Repositories\ColorRepository;
use App\Repositories\ColorRepositoryEloquent;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ColorRepository::class, ColorRepositoryEloquent::class);
        $this->app->bind(ProjectRepository::class, ProjectRepositoryEloquent::class);
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
