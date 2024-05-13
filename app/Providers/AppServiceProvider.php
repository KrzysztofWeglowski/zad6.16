<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate; 
use Illuminate\Support\ServiceProvider;
use App\Models\User; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('is-admin', function (User $user) { 
            return $user->role_id == 1; 
        }); 
        Gate::define('is-user', function (User $user) { 
            return $user->role_id == 2; 
        }); 
    }
}
