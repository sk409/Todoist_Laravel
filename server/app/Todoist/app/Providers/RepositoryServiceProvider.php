<?php

namespace App\Providers;

use App\Repositories\ColorRepository;
use App\Repositories\ColorRepositoryEloquent;
use App\Repositories\PriorityRepository;
use App\Repositories\PriorityRepositoryEloquent;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectRepositoryEloquent;
use App\Repositories\TodoRepository;
use App\Repositories\TodoRepositoryEloquent;
use App\Repositories\TodoSectionRepository;
use App\Repositories\TodoSectionRepositoryEloquent;
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
        $this->app->bind(PriorityRepository::class, PriorityRepositoryEloquent::class);
        $this->app->bind(ProjectRepository::class, ProjectRepositoryEloquent::class);
        $this->app->bind(TodoSectionRepository::class, TodoSectionRepositoryEloquent::class);
        $this->app->bind(TodoRepository::class, TodoRepositoryEloquent::class);
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
