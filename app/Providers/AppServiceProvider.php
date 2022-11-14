<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $this->app->when(UserRepository::class)
            ->needs(User::class)
            ->give(function () {
                $route = request()->route();
                if($route && $route->hasParameter('user'))
                {
                    return User::findOrFail($route->parameter('user'));
                }else{
                    return User::class;
                }
                
            });

        $this->app->bind(
            'App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\Eloquent\UserRepository'
        );
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
