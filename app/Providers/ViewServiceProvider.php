<?php

namespace App\Providers;

use App\Models\Hero;
use App\Models\Major;
use App\Models\School;
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
            $view
                ->with('majors', Major::getMajorForHome())
                ->with('tagline', Hero::select('tagline')->first()->tagline)
                ->with('ppdb_link', School::select('ppdb_link')->first()->ppdb_link);
        });

        View::composer('components.app', function ($view) {
            $view->with('info', School::first())->with('majors', Major::getMajorForHome());

        });
    }
}