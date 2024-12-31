<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyOTP extends BaseBroadcastBuddy
{
    public function generateOTP()
    {
        return $this->makeRequest('otp/generate', 'GET');
    }

    public function verifyOTP($code)
    {
        $data = ['code' => $code];
        return $this->makeRequest('otp/verify', 'GET', $data);
    }
}
