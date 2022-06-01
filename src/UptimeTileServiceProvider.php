<?php

namespace Quarterloop\UptimeTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Quarterloop\UptimeTile\Commands\FetchUptimeCommand;

class UptimeTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchUptimeCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-uptime-tile'),
        ], 'dashboard-uptime-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-uptime-tile');

        Livewire::component('uptime-tile', UptimeTileComponent::class);
    }
}
