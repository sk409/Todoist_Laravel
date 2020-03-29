<?php

namespace App\Providers;

use App\DDD\Service\UseCase\Project\StoreDefaultProjectUseCase;
use App\DDD\Service\UseCase\User\RegisterUserUseCase;
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
        $this->app->bind(StoreDefaultProjectUseCase::class, StoreDefaultProjectUseCase::class);
        $this->app->bind(RegisterUserUseCase::class, RegisterUserUseCase::class);
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
