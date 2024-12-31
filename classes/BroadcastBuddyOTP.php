<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyOTP extends BaseBroadcastBuddy
{
    /**
     * Generates OTP
     * @return bool|string
     */
    public function generateOTP()
    {
        return $this->makeRequest('otp/generate', 'GET');
    }

    /**
     * Verifies OTP
     * @param mixed $code
     * @return bool|string
     */
    public function verifyOTP($code)
    {
        $data = ['code' => $code];
        return $this->makeRequest('otp/verify', 'GET', $data);
    }
}
