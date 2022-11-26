<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('notForAdmin', function ($user) {
            if (auth()->check() && !in_array($user->role, [2])) { // use ==
                return true;
            }
            return false || null;
        });
        Gate::define('notForDocter', function ($user) {
            if (auth()->check() && !in_array($user->role, [3])) {
                return true;
            }
            return false || null;
        });
    }
}
