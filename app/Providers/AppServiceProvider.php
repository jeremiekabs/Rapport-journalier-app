<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Session;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        //Redirection après authentification
        RedirectIfAuthenticated::redirectUsing(function () {
            return route('dashboard');
        });
        //Redirection non authentifié
        Authenticate::redirectUsing(function () {
            Session::flash('fail', 'Vous n\'êtes pas authentifié');
            return route('login');
        });
    }
}
