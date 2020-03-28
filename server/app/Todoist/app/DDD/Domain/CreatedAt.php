<?php

namespace App\DDD\Domain;

use Carbon\Carbon;

class CreatedAt
{

    public static function create(Carbon $date): CreatedAt
    {
        $object = new CreatedAt();
        $object->date = $date;
        return $object;
    }

    /** @var Carbon */
    private $date;

    public function getValue(): Carbon
    {
        return $this->date;
    }

    private function __construct()
    {
    }
}
