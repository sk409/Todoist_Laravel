<?php

namespace App\DDD\Domain\Todo;

use Carbon\Carbon;

class TodoDueDate
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
