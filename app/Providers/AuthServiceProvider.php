<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;    

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Gate::define('isAdmin', function ($user) {
        return $user->is_admin;  
    });
        Gate::define('isUserName', function ($user, $userName) {
        return $user->name === $userName;
    });
        Gate::define('belongsToUser', function ($user, $invoiceId) {
    // Assuming your User model has a relationship with invoices, adjust this as needed
        return $user->invoices()->where('invoice_number', $invoiceId)->exists();
    });
    }
}
