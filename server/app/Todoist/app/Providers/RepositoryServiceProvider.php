<?php

namespace App\Providers;

use App\DDD\Infrastructure\Color\ColorRepository;
use App\DDD\Infrastructure\Color\ColorRepositoryEloquent;
use App\DDD\Infrastructure\Priority\PriorityRepository;
use App\DDD\Infrastructure\Priority\PriorityRepositoryEloquent;
use App\DDD\Infrastructure\Project\ProjectRepository;
use App\DDD\Infrastructure\Project\ProjectRepositoryEloquent;
use App\DDD\Infrastructure\Todo\TodoRepository;
use App\DDD\Infrastructure\Todo\TodoRepositoryEloquent;
use App\DDD\Infrastructure\TodoSection\TodoSectionRepository;
use App\DDD\Infrastructure\TodoSection\TodoSectionRepositoryEloquent;
use App\DDD\Infrastructure\TodoStatus\TodoStatusRepository;
use App\DDD\Infrastructure\TodoStatus\TodoStatusRepositoryEloquent;
use App\DDD\Infrastructure\User\UserRepository;
use App\DDD\Infrastructure\User\UserRepositoryEloquent;
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
        $this->app->bind(TodoRepository::class, TodoRepositoryEloquent::class);
        $this->app->bind(TodoSectionRepository::class, TodoSectionRepositoryEloquent::class);
        $this->app->bind(TodoStatusRepository::class, TodoStatusRepositoryEloquent::class);
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
