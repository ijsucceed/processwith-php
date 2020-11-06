<?php

namespace ProcessWith\Processors\Flutterwave;

use Curl\Curl;
use ProcessWith\Processors\Processor;

class Flutterwave extends Processor
{
    /**
     * Ravepay Endpoints
     */
    protected $endpoints = [
        'payments' => 'v3'
    ];

    /**
     * Curl request
     * 
     * @var Curl
     */
    protected $request;

    /**
     * Constructor
     * 
     * @since 0.5
     */
    public function __construct(string $secretKey)
    {
        parent::__construct('flutterwave', $secretKey, 'https://api.flutterwave.com');

        $this->setHeaders([
            'Authorization' => sprintf('Bearer %s', $secretKey),
            'Content-Type'  => 'application/json',
        ]);

        $this->request = new Curl();
        $this->request->setHeaders( $this->getHeaders() );
    }
}