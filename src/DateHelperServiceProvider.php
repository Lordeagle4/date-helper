<?php

namespace Awtechs\DateHelper;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Awtechs\DateHelper\Blade\DateBladeDirectives;

/**
 * Class DateHelperServiceProvider
 *
 * Handles package registration, blade directives, and component setup.
 *
 * @package Awtechs\DateHelper
 */
class DateHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Register custom Blade directives
        DateBladeDirectives::register();

        // Register Blade components
        Blade::componentNamespace('Awtechs\\DateHelper\\Components', 'date');

        // Load package views (for Blade components)
        $this->loadViewsFrom(__DIR__ . '/../resources/views/components', 'date');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // You could bind DateHelper in the container if needed
        // $this->app->singleton(DateHelper::class, fn () => new DateHelper());
    }
}
