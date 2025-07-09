<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS in production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
            URL::forceRootUrl('https://' . request()->getHost());
        }

        // Alternative: Force HTTPS if request is secure
        if (request()->isSecure()) {
            URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();
    }
}
