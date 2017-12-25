<?php
namespace sandeshsays\SMS;

use Illuminate\Support\ServiceProvider;

class SMSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SMS::class, function () {
            return new SMS();
        });
        $this->app->alias(SMS::class, 'SMS');
    }
}