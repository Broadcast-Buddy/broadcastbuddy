<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyNotification extends BaseBroadcastBuddy
{
    /**
     * Sends notification to desktop devices
     * @param mixed $website
     * @param mixed $title
     * @param mixed $icon
     * @param mixed $click
     * @param mixed $text
     * @return mixed
     */
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
