<?php

namespace TNM\SMSNotification\Services;

class SMSService implements ISMSService
{

    public function query(string $msisdn, string $message)
    {
        try {
            \Http::withHeaders([
                "Content-Type" => "application/json",
                "Accept" => "application/json"
            ])->post(config('sms_notification.messenger_url'), [
                'phone' => msisdn($msisdn)->toVgsFormat(),
                'message' => $message
            ]);

        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
        }
    }
}
