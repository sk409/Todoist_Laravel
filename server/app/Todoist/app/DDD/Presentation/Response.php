<?php

namespace App\DDD\Presentation;

class Response
{

    public function __toString()
    {
        return json_encode($this);
    }
}
