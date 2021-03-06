<?php

namespace Modules\Auth\Providers;

use Modules\Auth\Http\Middleware\CheckUserRole;
use Illuminate\Console\Application;
use Illuminate\Support\ServiceProvider;
use Modules\Auth\Services\RoleChecker;

class UserRoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CheckUserRole::class, function (Application $app) {
            return new CheckUserRole($app->make(RoleChecker::class));
        });
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
