# BroadcastBuddy PHP SDK

This document provides instructions for installing and using the BroadcastBuddy PHP SDK, which allows you to interact with the BroadcastBuddy API seamlessly.

## Installation

### Requirements
1. PHP 7.4 or higher
2. cURL extension enabled
3. Composer installed

### Steps

1. **Clone or Download the SDK**
   Download or clone the SDK from the repository into your project directory:
   ```bash
   git clone https://github.com/your-repo/broadcastbuddy-php-sdk.git
   ```

2. **Install Dependencies**
   Navigate to the SDK directory and install dependencies using Composer:
   ```bash
   composer install
   ```

3. **Include the SDK in Your Project**
   Use the provided `loader.php` file to include all necessary classes:
   ```php
   require_once 'path/to/BroadcastBuddy/loader.php';
   ```

## Usage Examples

### Initialize the SDK
Start by creating an instance of any class with your API key:
```php
$apiKey = 'your_api_key_here';
$whatsapp = new BroadcastBuddyWhatsApp($apiKey);
```

### Examples of Operations

#### WhatsApp Integration
```php
// Checks WhatsApp session status
$response = $whatsapp->sessionStatus();
print_r($response);

// Send a WhatsApp message
$response = $whatsapp->sendMessage('recipient_id', 'Hello, World!');
print_r($response);
```

#### SMS Integration
```php
$sms = new BroadcastBuddySMS($apiKey);

// Check SMS balance
$response = $sms->checkBalance();
print_r($response);

// Send an SMS
$response = $sms->sendSMS('recipient_number', 'Your OTP is 12345', 'SenderID');
print_r($response);
```

#### Account Management
```php
$account = new BroadcastBuddyAccount($apiKey);

// Add contact to subscription
$first_name = 'Jane';
$last_name = 'Doe';
$email = 'jane@example.com';
$birthday = '1998/04/22';
$contact = '233558382705';
$response = $account->updateAccount($first_name,$last_name,$email,$birthday,$contact);
print_r($response);
```

#### OTP Handling
```php
$otp = new BroadcastBuddyOTP($apiKey);

// Generate an OTP
$response = $otp->generateOTP();
print_r($response);

// Verify an OTP
$response = $otp->verifyOTP('123456');
print_r($response);
```

#### Email Management
```php
$email = new BroadcastBuddyEmail($apiKey);

// Compose and send an email
$response = $email->composeEmail('recipient@example.com', 'Subject', 'Message Body');
print_r($response);
```

#### Notifications
```php
$notification = new BroadcastBuddyNotification($apiKey);

// Send a push notification
$response = $notification->sendPushNotification('example.com','Alert','https://example.com/favicon.ico','https://example.com/callback','This is a test notification');
print_r($response);
```

#### Ultimate Integration
```php
$ultimate = new BroadcastBuddyUltimate($apiKey);

// Broadcast a message across multiple channels
$message = 'Hello';
$channels = [
    ['gateway' => 'sms', 'recipient' => '1234567890'],
    ['gateway' => 'email', 'recipient' => 'recipient@example.com', 'subject' => 'Test Email']
];
$response = $ultimate->sendBroadcast($channels, $message);
print_r($response);
```

## Error Handling
Handle API errors gracefully by checking the response structure:
```php
if (isset($response['error'])) {
    echo 'Error: ' . $response['error'];
} else {
    print_r($response);
}
```

## File Structure
Ensure your project includes the following structure:
```
/BroadcastBuddy/
├── classes/
│   ├── BaseBroadcastBuddy.php
│   ├── BroadcastBuddyWhatsApp.php
│   ├── BroadcastBuddySMS.php
│   ├── BroadcastBuddyAccount.php
│   ├── BroadcastBuddyOTP.php
│   ├── BroadcastBuddyNotification.php
│   ├── BroadcastBuddyEmail.php
│   └── BroadcastBuddyUltimate.php
└── loader.php
```

## Support
For further assistance, contact the development team or refer to the [BroadcastBuddy API Documentation](https://docs.broadcastbuddy.app).
