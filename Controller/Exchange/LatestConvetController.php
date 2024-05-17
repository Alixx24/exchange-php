<?php


namespace Controller\Exchange;

use Reoisitory\MarketCapInfoRepo;

class LatestConvetController
{
    public function convertEthToUSD()
    {
        require_once 'Repository/MarketCapInfoRepo.php';
        $rep = new MarketCapInfoRepo();

        $url = 'https://pro-api.coinmarketcap.com/v1/fiat/map';

        $parameters = [
            'start' => '1',
            'limit' => '2',
            'sort' => 'id',
            'include_metals' => 'false'
        ];

        $headers =  $rep->apiHeader();

        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource


        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1
        ));

        $response = curl_exec($curl); // Send the request, save the response

        $result = json_decode($response, true);
        var_dump($result);
        curl_close($curl); // Close request
    }
}
