<?php

namespace SanderJongsma\PrintNode\Facades;

use Illuminate\Support\Facades\Facade;

class PrintJob extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'printjob';
    }
}
