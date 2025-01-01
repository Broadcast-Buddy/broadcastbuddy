<?php

require_once 'BaseBroadcastBuddy.php';

class BroadcastBuddyWhatsApp extends BaseBroadcastBuddy
{
    /**
     * Gets your WhatsApp instance status
     * @return bool|string
     */
    public function sessionStatus()
    {
        return $this->makeRequest('whatsapp/session/status', 'GET');
    }

    /**
     * Sends message to a WhatsApp contact
     * @param mixed $recipient
     * @param mixed $message
     * @return bool|string
     */
    public function sendMessage($recipient, $message)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'message' => $message
        ];
        return $this->makeRequest('whatsapp/compose/text', 'POST', $data);
    }


    /*public function sendButtons($recipient, $message, $title, $footer, $buttons)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'message' => $message,
            'title' => $title,
            'footer' => $footer,
            'buttons' => $buttons,
        ];
        return $this->makeRequest('whatsapp/compose/buttons', 'POST', $data);
    }*/

    /*public function sendList($recipient, $message, $button_text, $title, $footer, $sections)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'body' => $message,
            'title' => $title,
            'button_text' => $button_text,
            'footer' => $footer,
            'sections' => $sections,
        ];
        return $this->makeRequest('whatsapp/compose/list', 'POST', $data);
    }*/

    /**
     * Sends media to a WhatsApp contact
     * @param mixed $recipient
     * @param mixed $caption
     * @param mixed $media_url
     * @return bool|string
     */
    public function sendMedia($recipient, $caption, $media_url)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'caption' => $caption,
            'media_url' => $media_url
        ];
        return $this->makeRequest('whatsapp/compose/image', 'POST', $data);
    }

    /**
     * sends a Document
     * @param mixed $recipient
     * @param mixed $caption
     * @param mixed $file_url
     * @return mixed
     */
    public function sendDocument($recipient, $caption, $file_url)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'caption' => $caption,
            'media_url' => $file_url
        ];
        return $this->makeRequest('whatsapp/compose/document', 'POST', $data);
    }

    /**
     * Sends location to a WhatsApp contact
     * @param mixed $recipient
     * @param mixed $latitude
     * @param mixed $longitude
     * @param mixed $message
     * @return bool|string
     */
    public function sendLocation($recipient, $latitude, $longitude, $message)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'message' => $message,
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
        return $this->makeRequest('whatsapp/compose/location', 'POST', $data);
    }

    /**
     * Sends location to a WhatsApp contact
     * @param mixed $recipient
     * @param mixed $poll_name
     * @param mixed $poll_options
     * @param mixed $allow_multiple_answers
     * @return bool|string
     */
    public function sendPoll($recipient, $poll_name, $poll_options, $allow_multiple_answers)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'poll_name' => $poll_name,
            'poll_options' => $poll_options,
            'allow_multiple_answers' => $allow_multiple_answers
        ];
        return $this->makeRequest('whatsapp/compose/poll', 'POST', $data);
    }

    /**
     * Sends contact to a WhatsApp contact
     * @param mixed $recipient
     * @param mixed $contact_id
     * @return bool|string
     */
    public function sendContact($recipient, $contact_id)
    {
        $data = [
            'receiver_type' => 'user',
            'recipient' => $recipient,
            'contact' => $contact_id,
        ];
        return $this->makeRequest('whatsapp/compose/contact', 'POST', $data);
    }
}
