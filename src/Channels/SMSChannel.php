<?php

namespace TNM\SMSNotification\Channels;

use Illuminate\Notifications\Notification;
use TNM\SMSNotification\Services\SMSClient;

class SMSChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);
        $notifiableAttribute = config('sms_notification.notifiable_attribute');

        (new SMSClient($notifiable->$notifiableAttribute, $message))->query();
    }
}
