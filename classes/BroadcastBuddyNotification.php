<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyNotification extends BaseBroadcastBuddy
{
    public function sendPushNotification($data)
    {
        return $this->makeRequest('notification/push', 'POST', $data);
    }
}
