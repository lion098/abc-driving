<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\{SiteSetting, Course};

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

        View::composer('*', function ($view) {
            $sitesettingdata = SiteSetting::first();
            $view->with('sitesettingdata', $sitesettingdata);
        });

        View::composer('*', function ($view) {
            $courses = Course::get();
            $view->with('courses', $courses);
        });
    }
}
