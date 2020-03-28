<?php

namespace App\DDD\Domain;

use Carbon\Carbon;

class UpdatedAt
{

    public static function create(Carbon $date): UpdatedAt
    {
        $object = new UpdatedAt();
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
