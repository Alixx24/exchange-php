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

        $response = $rep->defualtCurl($request, $headers);


        $result = json_decode($response, true)['data']['1']['quote']['0']['symbol'];
        print_r($result);
    }
}
