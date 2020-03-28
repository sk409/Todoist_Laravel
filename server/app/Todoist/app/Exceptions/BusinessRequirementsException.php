<?php

namespace App\Exceptions;

use Exception;

class BusinessRequirementsException extends Exception
{

    /** @var string */
    protected $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function report()
    {
        info($this->message);
    }
}
