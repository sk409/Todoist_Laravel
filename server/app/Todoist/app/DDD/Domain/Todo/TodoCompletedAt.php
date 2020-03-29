<?php

namespace App\DDD\Domain\Todo;

use App\DDD\Domain\ValueObject;
use Carbon\Carbon;

class TodoCompletedAt extends ValueObject
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
