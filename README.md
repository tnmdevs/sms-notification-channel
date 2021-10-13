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

class SampleNotification extends Notification
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
use TNM\SMSNotification\Notifications\SampleNotification;

Notification::send($user, new SampleNotification($message));
```
