<?php

/**
 * BroadcastBuddy API Wrapper
 *
 * @link https://broadcastbuddy.app
 * @link https://github.com/broadcastbuddy
 */
class BroadcastBuddy
{
    private $apiKey;
    private $apiBaseUrl;

    /**
     * Initialize BroadcastBuddy
     *
     * @param string $apiKey Your API key
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->apiBaseUrl = "https://api.broadcastbuddy.app/v1";
    }

    private function sendRequest($endpoint, $method = 'GET', $data = [])
    {
        $url = $this->apiBaseUrl . $endpoint;

        $headers = [
            'Content-Type: application/json',
            'X-Authorization: ' . $this->apiKey,
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($method === 'POST' || $method === 'PUT') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        try {
            $result = curl_exec($ch);

            if ($result === FALSE) {
                throw new Exception('Failed to send request: ' . curl_error($ch));
            }

            return $result;
        } catch (Exception $e) {
            // Handle the exception (e.g., log, rethrow, etc.)
            error_log('Error in sendRequest: ' . $e->getMessage());
            return false;
        } finally {
            curl_close($ch);
        }
    }


    /**
     * Get WhatsApp instance
     */
    public function whatsapp()
    {
        return new class($this) {
            private $broadcastBuddy;

            public function __construct($broadcastBuddy)
            {
                $this->broadcastBuddy = $broadcastBuddy;
            }

            /**
             * Login to WhatsApp
             */
            public function logout()
            {
                return $this->broadcastBuddy->sendRequest('/whatsapp/logout');
            }

            /**
             * Login to WhatsApp
             */
            public function getContacts()
            {
                return $this->broadcastBuddy->sendRequest('/whatsapp/contacts');
            }

            /**
            * Get WhatsApp settings
            */
            public function getInstance()
            {
                return $this->broadcastBuddy->sendRequest('/whatsapp/settings');
            }

            /**
            * Send message
            *
            * @param string $contact
            * @param string $message
            * @param string $contact_type
            * @param string $quick
            * @return mixed
            */
            public function sendMessage($contact, $message, $contact_type, $quick = null)
            {
                $data = [
                    'contact' => $contact,
                    'message' => $message,
                    'contact_type' => $contact_type,
                ];
                if ($quick !== null) {
                    $data['quick'] = $quick;
                }
                return $this->broadcastBuddy->sendRequest('/whatsapp/compose/text', 'POST', $data);
            }

            /**
            * Send media
            *
            * @param string $contact
            * @param string $media
            * @param string $caption
            * @param string $contact_type
            * @param string $media_type
            * @param string $quick
            * @return mixed
            */
            public function sendMedia($contact, $media, $caption, $contact_type, $media_type = 'image', $quick = null)
            {
                $data = [
                    'contact' => $contact,
                    'media' => $media,
                    'message' => $caption,
                    'contact_type' => $contact_type,
                ];
                if ($quick !== null) {
                    $data['quick'] = $quick;
                }
                return $this->broadcastBuddy->sendRequest('/whatsapp/compose/'.$media_type, 'POST', $data);
            }
        };
    }

    public function sms()
    {
        return new class($this) {
            private $broadcastBuddy;

            public function __construct($broadcastBuddy)
            {
                $this->broadcastBuddy = $broadcastBuddy;
            }

            /**
            * Send message
            *
            * @param string $recipients
            * @param string $sender
            * @param string $message
            * @return mixed
            */
            public function compose($recipients, $sender, $message)
            {
                $data = [
                    'contacts' => $recipients,
                    'sender_id' => $sender,
                    'message' => $message,
                ];
                return $this->broadcastBuddy->sendRequest('/sms/compose', 'POST', $data);
            }
        };
    }
}

