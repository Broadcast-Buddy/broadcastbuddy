<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyUltimate extends BaseBroadcastBuddy
{
    public function sendBroadcast($channels)
    {
        $data = ['channels' => $channels];
        return $this->makeRequest('message/compose', 'POST', $data);
    }

    public function getLogs()
    {
        return $this->makeRequest('logs', 'GET');
    }
}
