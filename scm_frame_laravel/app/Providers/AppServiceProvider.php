<?php

namespace App\Providers;

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
        $this->app->bind('App\Contracts\Dao\Blog\BlogDaoInterface', 'App\Dao\Blog\BlogDao');
        $this->app->bind('App\Contracts\Services\Blog\BlogServiceInterface', 'App\Services\Blog\BlogService');
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
