<?php

namespace App\DDD\Domain\Priority;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;

class Priority
{

    public static function create(PriorityHex $hex, PriorityName $name)
    {
        $priority = new Priority();
        $priority->hex = $hex;
        $priority->name = $name;
    }

    public static function reconstructFromStorage(PriorityHex $hex, PriorityId $id, PriorityName $name, CreatedAt $createdAt, UpdatedAt $updatedAt)
    {
        $priority = new Priority();
        $priority->hex = $hex;
        $priority->id = $id;
        $priority->name = $name;
        $priority->createdAt = $createdAt;
        $priority->updatedAt = $updatedAt;
    }

    /** @var PriorityHex */
    private $hex;

    /** @var PriorityId */
    private $id;

    /** @var PriorityName */
    private $name;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    private function __construct()
    {
    }
}
