<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyWhatsApp extends BaseBroadcastBuddy
{
    public function startSession()
    {
        return $this->makeRequest('whatsapp/session/start', 'GET');
    }

    public function terminateSession()
    {
        return $this->makeRequest('whatsapp/session/terminate', 'GET');
    }

    public function sendMessage($recipient, $message)
    {
        $data = ['recipient' => $recipient, 'message' => $message];
        return $this->makeRequest('whatsapp/compose/text', 'POST', $data);
    }
}
