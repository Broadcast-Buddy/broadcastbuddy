<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyAccount extends BaseBroadcastBuddy
{

    /**
     * Adds a contact to your subscription
     * @param mixed $first_name
     * @param mixed $last_name
     * @param mixed $email
     * @param mixed $birthday
     * @param mixed $group_id
     * @param mixed $contact
     * @return bool|string
     */
    public function addContact($first_name,$last_name,$email,$birthday,$contact,$group_id = '')
    {
        $data = [
          'first_name' => $first_name,  
          'last_name' => $last_name,  
          'email' => $email,  
          'birthday' => $birthday,  
          'group_id' => $group_id,  
          'contact' => $contact,  
        ];
        return $this->makeRequest('contacts/add', 'POST', $data);
    }
}
