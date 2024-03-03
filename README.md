# BroadcastBuddy API Wrapper for PHP

This is a PHP wrapper for the BroadcastBuddy API, which allows developers to easily integrate multi-channel messaging functionality into their applications. With BroadcastBuddy, you can send messages via WhatsApp and SMS to engage with your customer/user base effortlessly.

## Getting Started

To get started with the BroadcastBuddy API Wrapper, follow these steps:

1. **Sign Up**: Visit [BroadcastBuddy](https://broadcastbuddy.app) and sign up for an account to obtain your API key.

2. **Installation**: Include the `BroadcastBuddy.php` file in your PHP project and instantiate the `BroadcastBuddy` class with your API key.

    ```php
    <?php
    require_once('BroadcastBuddy.php');

    $WAapiKey = 'YOUR_WHATSAPP_API_KEY';
    $SMSapiKey = 'YOUR_SMS_API_KEY';
    $broadcastWhatsApp = new BroadcastBuddy($WAapiKey);
    $broadcastSMS = new BroadcastBuddy($SMSapiKey);
    ```

3. **Usage**: You can now use the wrapper to send messages via WhatsApp or SMS.

## Usage Examples

### WhatsApp

```php
// Initialize WhatsApp instance
$whatsapp = $broadcastWhatsApp->whatsapp();

// Get WhatsApp settings
$settings = $whatsapp->getInstance();

// Send a text message
$contact = 'PHONE_NUMBER';
$message = 'Hello, this is a test message.';
$contactType = 'user';
$response = $whatsapp->sendMessage($contact, $message, $contactType);

// Send media (e.g., image)
$media = 'https://example.com/image.jpg';
$caption = 'Check out this image!';
$response = $whatsapp->sendMedia($contact, $media, $caption, $contactType);
```

### SMS

```php
// Initialize SMS instance
$sms = $broadcastSMS->sms();

// Compose and send SMS
$recipients = 'PHONE_NUMBER1,PHONE_NUMBER2';
$sender = 'SENDER_ID';
$message = 'Hello, this is a test SMS.';
$response = $sms->compose($recipients, $sender, $message);
```

## Documentation

For more information on available methods and parameters, refer to the [BroadcastBuddy API documentation](https://api.broadcastbuddy.app/v1).

## Support

If you encounter any issues or have any questions, please contact support@broadcastbuddy.app.

## License

This wrapper is open-source software licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
