<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyEmail extends BaseBroadcastBuddy
{
    /**
     * Sends Email to a single address
     * @param mixed $recipient
     * @param mixed $subject
     * @param mixed $message
     * @return bool|string
     */
    public function sendEmail($recipient, $subject, $message)
    {
        $data = [
            'receiver' => $recipient,
            'subject' => $subject,
            'message' => $message,
        ];
        return $this->makeRequest('email/send', 'POST', $data);
    }
}
