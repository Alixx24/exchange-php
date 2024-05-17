<?php

namespace Controller\Exchange;

use Reoisitory\MarketCapInfoRepo;

class ListingLastContoller
{
    public function list()
    {
        require_once 'Repository/MarketCapInfoRepo.php';
        $rep = new MarketCapInfoRepo();

        $url = 'https://pro-api.coinmarketcap.com/v3/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '2',
            'limit' => '2',
            'convert' => 'USD'
        ];


        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL

        $headers =  $rep->apiHeader();
        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers 
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response

        $result = json_decode($response, true)['data']['1']['quote']['0']['symbol'];
        print_r($result);
        curl_close($curl); // Close request

    }
}
