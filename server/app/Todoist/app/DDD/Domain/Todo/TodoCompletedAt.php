<?php

namespace App\DDD\Domain\Todo;

use Carbon\Carbon;

class TodoCompletedAt
{

    public static function create(Carbon $date): TodoCompletedAt
    {
        $object = new TodoCompletedAt();
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
