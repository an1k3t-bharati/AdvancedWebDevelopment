<?php
namespace App\Controllers;

class News extends BaseController
{
    public function index()
    {
        $apiKey = '7f80d9ba36ae38d4294d7ab50d60647f';
        $url = "https://gnews.io/api/v4/search?q=fashion&lang=en&max=8&apikey={$apiKey}";

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->get($url);
            $body = json_decode($response->getBody(), true);
            $articles = $body['articles'] ?? [];
        } catch (\Exception $e) {
            $articles = [];
        }

        return view('pages/news', ['articles' => $articles]);
    }
}
