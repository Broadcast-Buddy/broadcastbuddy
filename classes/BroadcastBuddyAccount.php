<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyAccount extends BaseBroadcastBuddy
{
    public function getUserDetails()
    {
        return $this->makeRequest('account/details', 'GET');
    }

    public function updateAccount($data)
    {
        return $this->makeRequest('account/update', 'POST', $data);
    }
}
