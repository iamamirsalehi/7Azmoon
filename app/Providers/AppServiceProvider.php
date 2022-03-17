<?php

namespace App\Providers;

use App\repositories\Contracts\UserRepositoryInterface;
use App\repositories\Eloquent\EloquentUserRepository;
use App\repositories\Json\JsonUserRepository;
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
        //
    }

    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }
}
