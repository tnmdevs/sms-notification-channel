# Laravel SMS Notification Channel

## Quick Start

### Install the package
```terminal
composer require tnmdev/sms-notifation-channel
```

### Sample implementation
```php
namespace TNM\SMSNotification\Notifications;

use Illuminate\Notifications\Notification;
use TNM\SMSNotification\Channels\SMSChannel;

class SMSNotification extends Notification
{
    private string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [SMSChannel::class];
    }

    public function toSMS($notifiable): string
    {
        return $this->message;
    }
}
```
### Using the notification

```php
use TNM\SMSNotification\Notifications\SMSNotification;

Notification::send($user, new SMSNotification('This is a sample notification'));
```
## Configuration

## Publishing the config
The following command will publish a config file `config/sms_notification.php`
```terminal
php artisan vendor:publish --provider="TNM\SMSNotification\ChannelServiceProvider" --tag="config"
```
## Messenger URL

You can change the messenger URL either by editing the config directly or by adding an `.env` entry 
`SMS_NOTIFICATION_MESSENGER_URL="http://your-messanger-api"`
```php
'messenger_url' => env('SMS_NOTIFICATION_MESSENGER_URL', 'http://localohost'),
```

## Notifiable Attribute
By default, we look for the `phone_number` attribute on the notifiable entity. If your application has a different 
attribute, change that in the config
```php
'notifiable_attribute' => 'msisdn'
```
