<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Apis extends Controller
{
    public function wikipedia()
    {
        $search = $this->request->getGet('query');
        $apiUrl = "https://en.wikipedia.org/api/rest_v1/page/summary/" . urlencode($search);

        $response = file_get_contents($apiUrl);
        return $this->response->setJSON(json_decode($response, true));
    }

    public function unsplash()
    {
        $query = $this->request->getGet('query');
        $apiKey = 'YOUR_UNSPLASH_API_KEY';
        $apiUrl = "https://api.unsplash.com/search/photos?query=" . urlencode($query) . "&client_id=" . $apiKey;

        $response = file_get_contents($apiUrl);
        return $this->response->setJSON(json_decode($response, true));
    }
}
