<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Outlet' => 'App\Policies\OutletPolicy',
        'App\Models\Paket' => 'App\Policies\PaketPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Member' => 'App\Policies\MemberPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
