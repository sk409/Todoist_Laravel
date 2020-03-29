<?php

namespace App\DDD\Domain\Todo;

use App\DDD\Domain\ValueObject;
use Carbon\Carbon;

class TodoDueDate extends ValueObject
{
    public static function create(Carbon $date): TodoDueDate
    {
        $object = new TodoDueDate();
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
