<?php

namespace TNM\SMSNotification\Services;

class SMSClient
{
    private string $msisdn;
    private string $message;
    private ISMSService $service;

    public function __construct(string $msisdn, string $message)
    {
        $this->msisdn = $msisdn;
        $this->message = $message;
        $this->service = app(ISMSService::class);
    }

    public function query()
    {
        $this->service->query($this->msisdn, $this->message);
    }
}
