<?php

namespace Reoisitory;

class MarketCapInfoRepo
{
    public function apiHeader()
    {
       return $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: a0e9ce7c-43fd-491f-8c52-63874b99b19e',
        ];
      
    }
    // return 'a0e9ce7c-43fd-491f-8c52-63874b99b19e';
}
