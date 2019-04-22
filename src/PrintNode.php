<?php

namespace SanderJongsma\PrintNode;

use PrintNode\Client;
use PrintNode\Credentials\ApiKey;

class PrintNode
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $credentials = new ApiKey(config('printnode.apikey'));
        $this->client = new Client($credentials);
    }

    public function whoAmI()
    {
        return $this->client->viewWhoAmI();
    }

    public function getComputers($offset = 0, $limit = 500, $computerSet = null)
    {
        return $this->client->viewComputers($offset, $limit, $computerSet);
    }

    public function getPrinters($offset = 0, $limit = 500, $printerSet = null, $computerSet = null)
    {
        return $this->client->viewPrinters($offset, $limit, $printerSet, $computerSet);
    }

    public function getPrintJobs($offset = 0, $limit = 500, $printJobSet = null, $printerSet = null)
    {
        return $this->client->viewPrintJobs($offset, $limit, $printJobSet, $printerSet);
    }
}