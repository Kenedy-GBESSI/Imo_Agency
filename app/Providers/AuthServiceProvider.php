<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Property;
use App\Models\User;
use App\Policies\PropertyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Property::class => PropertyPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('all-admins',function(User $user){
              return $user->role === 'admin' || $user->role === 'super-admin';
        });
    }
}
