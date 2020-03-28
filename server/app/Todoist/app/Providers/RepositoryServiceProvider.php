<?php

namespace App\Providers;

use App\DDD\Infrastructure\Repository\Color\ColorRepository;
use App\DDD\Infrastructure\Repository\Color\ColorRepositoryEloquent;
use App\DDD\Infrastructure\Repository\Project\ProjectRepository;
use App\DDD\Infrastructure\Repository\Project\ProjectRepositoryEloquent;
use App\DDD\Infrastructure\Repository\User\UserRepository;
use App\DDD\Infrastructure\Repository\User\UserRepositoryEloquent;
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
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
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
