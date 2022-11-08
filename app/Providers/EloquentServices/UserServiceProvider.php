<?php

namespace App\Providers\EloquentServices;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserController::class);
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

    public function inactivateUser(User $user)
    {
        $user->is_active = 0;
        $user->save();
    }
}
