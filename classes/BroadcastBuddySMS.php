<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddySMS extends BaseBroadcastBuddy
{
    public function checkBalance()
    {
        return $this->makeRequest('sms/balance', 'GET');
    }

    public function sendSMS($recipient, $message, $senderId)
    {
        $data = [
            'contacts' => $recipient,
            'message' => $message,
            'sender_id' => $senderId,
        ];
        return $this->makeRequest('sms/compose', 'POST', $data);
    }
}
