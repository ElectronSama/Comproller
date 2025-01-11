<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
           
    }
    public function boot(): void
    {
        Blade::if('role', function (...$roles) {
            $user = auth()->user();
            if ($user && $user->role === 'admin') {
                return true;
            }
            return $user && in_array($user->role, $roles);
        });
        Blade::if('admin', function () {
            $user = auth()->user();
            return $user && $user->role === 'admin';
        });

        Blade::if('hr', function () {
            $user = auth()->user();
            return $user && $user->role === 'hr';
        });

        Blade::if('pu', function () {
            $user = auth()->user();
            return $user && $user->role === 'pu';
        });
    }
}
