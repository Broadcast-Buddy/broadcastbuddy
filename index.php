<?php
include_once('BroadcastBuddy.php');
$buddyWA = new BroadcastBuddy('WHATSAPP_API_KEY_HERE');
$whatsapp = $buddyWA->whatsapp();
//echo $whatsapp->whatsapp()->sendMessage('233500598571', 'Test From PHP Quick', 'user', 1);
//echo $whatsapp->getContacts();
//echo $whatsapp->getInstance();