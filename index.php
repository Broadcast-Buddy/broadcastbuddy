<?php
include_once('BroadcastBuddy.php');
$buddyWA = new BroadcastBuddy('b95bebcdd198ad547d99c70925e13299');
$whatsapp = $buddyWA->whatsapp();
//echo $whatsapp->whatsapp()->sendMessage('233500598571', 'Test From PHP Quick', 'user', 1);
//echo $whatsapp->getContacts();
//echo $whatsapp->getInstance();