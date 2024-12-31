<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddySMS extends BaseBroadcastBuddy
{
    /**
     * Checks SMS Balance
     * @return bool|string
     */
    public function checkBalance()
    {
        return $this->makeRequest('sms/balance?api_key='.$this->apiKey, 'GET');
    }

    /**
     * Sends bulk SMS
     * @param mixed $recipients
     * @param mixed $message
     * @param mixed $senderId
     * @return bool|string
     */
    public function bulkSMS($recipients, $message, $senderId)
    {
        $data = [
            'contacts' => $recipients,
            'message' => $message,
            'sender_id' => $senderId,
        ];
        return $this->makeRequest('sms/compose', 'POST', $data);
    }

    /**
     * Sends a single SMS
     * @param mixed $recipient
     * @param mixed $message
     * @param mixed $senderId
     * @return bool|string
     */
    public function sendSMS($recipient, $message, $senderId)
    {
        return $this->makeRequest('sms/send?api_key='.$this->apiKey.'&contact='.$recipient.'&message='.$message.'&sender_id='.$senderId, 'GET');
    }
}
