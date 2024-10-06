<?php

namespace HadiAghandeh\FriendlyId;

use Illuminate\Support\ServiceProvider;

class FriendlyIdServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/friendly-id.php', 'friendly-id'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/friendly-id.php' => config_path('friendly-id.php'),
        ], 'friendly-id');
    }
}