<?php

namespace App\Providers;

use App\Services\ColorService;
use App\Services\ColorServiceDefault;
use App\Services\PriorityService;
use App\Services\PriorityServiceDefault;
use App\Services\ProjectService;
use App\Services\ProjectServiceDefault;
use App\Services\TodoSectionService;
use App\Services\TodoSectionServiceDefault;
use App\Services\TodoService;
use App\Services\TodoServiceDefault;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ColorService::class, ColorServiceDefault::class);
        $this->app->bind(PriorityService::class, PriorityServiceDefault::class);
        $this->app->bind(ProjectService::class, ProjectServiceDefault::class);
        $this->app->bind(TodoSectionService::class, TodoSectionServiceDefault::class);
        $this->app->bind(TodoService::class, TodoServiceDefault::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
