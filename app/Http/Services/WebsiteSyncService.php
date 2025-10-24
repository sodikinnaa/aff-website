<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class WebsiteSyncService 
{
    
    public function verifyToken($token, $endpoint)
    {
        // If endpoint not provided, use default endpoint as in the prompt
        $endpoint = rtrim($endpoint, '/');
        $url = $endpoint . '/api/v1/verifikasi';

        // Make HTTP request with Authorization Bearer token, handle possible connection exceptions
        $tokenHeader = 'Bearer ' . $token;
            try {
                $response = Http::withHeaders([
                    'Authorization' => $tokenHeader,
                ])->get($url);
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                // Handle connection exception, e.g. return false or log the error
                return false;
            }

        // Jika responya lebih dari 200 maka returnkan false
        if ($response->status() > 200) {
            return false;
        }
        $jsonData = $response->json();
        if ($jsonData['authorization'] != $tokenHeader) {
            return false;
        }   
        return $response->json();
    }

    public function getProduct($token, $endpoint){
        // If endpoint not provided, use default endpoint as in the prompt
        $endpoint = rtrim($endpoint, '/');
        $url = $endpoint . '/api/v1/products';

        // Make HTTP request with Authorization Bearer token
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($url);

        return $response->json();
    }
}