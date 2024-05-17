<?php

namespace Reoisitory;

class MarketCapInfoRepo
{
    public function apiHeader()
    {
       return $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: **',
        ];
      
    }
    
    public function defualtCurl($request, $headers)
    {
        $curl = curl_init(); // Get cURL resource


        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1
        ));

       return $response = curl_exec($curl); // Send the request, save the response
    }
}
