<?php

namespace TNM\SMSNotification\Services;

interface ISMSService
{
    public function query(string $msisdn, string $message);
}
