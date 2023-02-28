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
        Gate::define('owner', function(User $user){
            return $user->roles === 'owner' || $user->roles === 'kasir' || $user->roles === 'admin';
        });

        Gate::define('kasir', function(User $user){
            return $user->roles === 'kasir' || $user->roles === 'admin';
        });

        Gate::define('admin', function(User $user){
            return $user->roles === 'admin';
        });

        Blade::directive('rupiah', function ($harga_rupiah) {
            return "<?= 'Rp' . number_format($harga_rupiah, 2); ?>";
        });
    }
}
