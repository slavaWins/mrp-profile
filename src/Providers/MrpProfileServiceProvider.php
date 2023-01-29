<?php

namespace MrpProfile\Providers;

use Illuminate\Support\ServiceProvider;

class MrpProfileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


        $migrations_path = __DIR__ . '/../copy/Controllers';
        if (file_exists($migrations_path)) {
            $this->publishes([
                $migrations_path => app_path('Http/Controllers'),
            ], 'public');
        }

        $migrations_path = __DIR__ . '/../copy/views';
        if (file_exists($migrations_path)) {
            $this->publishes([
                $migrations_path => resource_path('views/mrp-profile'),
            ], 'public');
        }


        $migrations_path = __DIR__ . '/../copy/Library';
        if (file_exists($migrations_path)) {
            $this->publishes([
                $migrations_path => app_path('Library'),
            ], 'public');
        }


    }
}
