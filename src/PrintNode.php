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
        $credentials = new ApiKey(config('printnode.auth.apikey'));
        $this->client = new Client($credentials);
    }

    public function whoAmI()
    {
        return $this->client->viewWhoAmI();
    }

    public function getComputers($offset = 0, $limit = 500, $computerSet = null)
    {
        return collect($this->client->viewComputers($offset, $limit, $computerSet));
    }

    public function getPrinters($offset = 0, $limit = 500, $printerSet = null, $computerSet = null)
    {
        return collect($this->client->viewPrinters($offset, $limit, $printerSet, $computerSet));
    }

    public function getPrintJobs($offset = 0, $limit = 500, $printJobSet = null, $printerSet = null)
    {
        return collect($this->client->viewPrintJobs($offset, $limit, $printJobSet, $printerSet));
    }

    public function createPrintJob($printJob)
    {
        return $this->client->createPrintJob($printJob);
    }
}