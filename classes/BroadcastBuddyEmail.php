<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyEmail extends BaseBroadcastBuddy
{
    public function composeEmail($recipient, $subject, $message, $template = '')
    {
        $data = [
            'receiver' => $recipient,
            'subject' => $subject,
            'message' => $message,
            'template' => $template,
        ];
        return $this->makeRequest('email/compose', 'POST', $data);
    }

    public function sendEmail($data)
    {
        return $this->makeRequest('email/send', 'POST', $data);
    }
}
