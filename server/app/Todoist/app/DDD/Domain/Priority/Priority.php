<?php

namespace App\DDD\Domain\Priority;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;

class Priority
{
    public static function create(PriorityHex $hex, PriorityName $name): Priority
    {
        $priority = new Priority();
        $priority->hex = $hex;
        $priority->name = $name;
        return $priority;
    }

    public static function reconstructFromStorage(PriorityHex $hex, PriorityId $id, PriorityName $name, CreatedAt $createdAt, UpdatedAt $updatedAt): Priority
    {
        $priority = new Priority();
        $priority->hex = $hex;
        $priority->id = $id;
        $priority->name = $name;
        $priority->createdAt = $createdAt;
        $priority->updatedAt = $updatedAt;
        return $priority;
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

    public function getHex(): PriorityHex
    {
        return $this->hex;
    }

    public function getId(): PriorityId
    {
        return $this->id;
    }

    public function getName(): PriorityName
    {
        return $this->name;
    }

    public function getCreatedAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    private function __construct()
    {
    }
}
