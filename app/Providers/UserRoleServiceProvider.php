<?php

namespace App\Providers;

use App\Http\Middleware\CheckUserRole;
use App\Role\RoleChecker;
use Illuminate\Console\Application;
use Illuminate\Support\ServiceProvider;

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
            return new CheckUserRole(
                $app->make(RoleChecker::class)
            );
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
