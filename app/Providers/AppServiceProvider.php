<?php

namespace App\Providers;

use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Guard;
use Laravel\Sanctum\Sanctum;

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
        class_alias(PersonalAccessToken::class, \Laravel\Sanctum\PersonalAccessToken::class);
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
