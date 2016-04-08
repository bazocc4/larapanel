<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Eloquent models fire several events, allowing you to hook into various points in the model's lifecycle using the following methods: creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored. Events allow you to easily execute code each time a specific model class is saved or updated in the database.
        // == https://laravel.com/docs/5.2/eloquent#events ==
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');            
            $this->app->register('Iber\Generator\ModelGeneratorProvider');
        }
    }
}
