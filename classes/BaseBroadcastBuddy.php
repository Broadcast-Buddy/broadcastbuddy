<?php

class BaseBroadcastBuddy
{
    protected const BASE_URL = 'https://api.broadcastbuddy.app/v1/';
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    protected function makeRequest($endpoint, $method = 'GET', $data = [])
    {
        $url = self::BASE_URL . $endpoint;
        $ch = curl_init();

        $headers = [
            'X-Authorization: ' . $this->apiKey,
            'Content-Type: application/json',
        ];

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return  json_decode($response, false);
    }
}
