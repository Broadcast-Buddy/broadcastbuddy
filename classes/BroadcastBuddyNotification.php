<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyNotification extends BaseBroadcastBuddy
{
    public function sendPushNotification($website, $title, $icon, $click, $text)
    {
        $data = [
            'website' => $website,
            'title' => $title,
            'icon' => $icon,
            'click' => $click,
            'description' => $text,
        ];
        return $this->makeRequest('notification/push', 'POST', $data);
    }
}
