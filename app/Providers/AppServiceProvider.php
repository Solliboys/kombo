<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Beri perlindungan agar tidak error saat tabel belum dibuat
        if (Schema::hasTable('organization_profiles')) {
             View::share('profile', \App\Models\OrganizationProfile::first());
        }
    }
}
