<?php

namespace SanderJongsma\PrintNode;

use PrintNode\Client;
use PrintNode\Credentials\ApiKey;

class PrintJob
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

    public function create($attributes = [])
    {
        if (empty($attributes)) {
            $attributes = config('printnode.attributes');
        }

        $printJob = new \PrintNode\Entity\PrintJob($this->client);
        $this->setAttributes($printJob, $attributes);

        return $printJob;
    }

    public function setAttributes($printJob, $attributes)
    {
        foreach ($attributes as $attributeKey => $attributeValue) {
            $printJob->$attributeKey = $attributeValue;
        }
    }
}