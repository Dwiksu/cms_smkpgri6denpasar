<?php

namespace App\Providers;

use App\Models\Major;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('components.navbar', function ($view) {
            $view->with('majors', Major::getMajorForHome());
        });
    }
}