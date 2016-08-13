<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('App\Repositories\PrivilegeRepositoryInterface', 'App\Repositories\PrivilegeRepository');
    }
}
