<?php

namespace Nekkoy\GatewaySmsturbo;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class SmsturboServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Nekkoy\GatewaySmsturbo\Services\GatewayService::class, function ($app) {
            return new \Nekkoy\GatewaySmsturbo\Services\GatewayService();
        });

        $this->app->singleton('gateway-smsturbo', function ($app) {
            return new \Nekkoy\GatewaySmsturbo\Services\GatewaySmsturboService();
        });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('gateway-smsturbo.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'gateway-smsturbo');
    }
}
