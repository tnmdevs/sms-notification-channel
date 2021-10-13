<?php

namespace TNM\SMSNotification;

use Illuminate\Support\ServiceProvider;
use TNM\SMSNotification\Services\ISMSService;
use TNM\SMSNotification\Services\SMSService;

class ChannelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'sms_notification');

        $this->app->bind(ISMSService::class, SMSService::class);

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('sms_notification.php')
            ], 'config');
        }
    }
}
