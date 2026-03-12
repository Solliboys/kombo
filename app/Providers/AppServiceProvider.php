<?php
use IlluminateSupportFacadesSchema;
use IlluminateSupportFacadesSchema;

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        if (Schema::hasTable("organization_profiles")) {
    {
        }
        if (Schema::hasTable("organization_profiles")) {
        \Illuminate\Support\Facades\View::share('profile', \App\Models\OrganizationProfile::first());
        }
    }
}
