<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('Owner', function(User $user){
            return $user->roles === 'Owner' || $user->roles === 'Kasir' || $user->roles === 'Admin';
        });

        Gate::define('Kasir', function(User $user){
            return $user->roles === 'Kasir' || $user->roles === 'Admin';
        });

        Gate::define('Admin', function(User $user){
            return $user->roles === 'Admin';
        });

        Blade::directive('rupiah', function ($harga_rupiah) {
            return "<?= 'Rp' . number_format($harga_rupiah, 2); ?>";
        });
    }
}
