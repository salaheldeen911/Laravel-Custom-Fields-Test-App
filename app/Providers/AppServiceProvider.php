<?php

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
    {
        // Register Custom Field Type
        app(\Salah\LaravelCustomFields\FieldTypeRegistry::class)
            ->register(new \App\CustomFields\FieldTypes\RatingField);

        // Register Custom Validation Rule
        app(\Salah\LaravelCustomFields\ValidationRuleRegistry::class)
            ->register(new \App\CustomFields\ValidationRules\UppercaseRule);
    }
}
