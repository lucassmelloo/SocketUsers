<?php

namespace App\Providers\EloquentServices;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Providers\AppServiceProvider;
use App\Repositories\Eloquent\UserRepository;

class UserServiceProvider extends AppServiceProvider
{

    public function __contruct()
    {
    }

    public function register()
    {
        $this->app->singleton(UserRepository::class);
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
