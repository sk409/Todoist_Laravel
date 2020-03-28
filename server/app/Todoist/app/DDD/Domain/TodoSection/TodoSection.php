<?php

namespace App\DDD\Domain\TodoSection;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;

class TodoSection
{

    public static function create(TodoSectionName $name): TodoSection
    {
        $todoSection = new TodoSection();
        $todoSection->name = $name;
        return $todoSection;
    }

    public static function reconstructFromStorage(TodoSectionId $id, TodoSectionName $name, CreatedAt $createdAt, UpdatedAt $updatedAt): TodoSection
    {
        $todoSection = new TodoSection();
        $todoSection->id = $id;
        $todoSection->name = $name;
        $todoSection->createdAt = $createdAt;
        $todoSection->updatedAt = $updatedAt;
        return $todoSection;
    }

    /** @var TodoSectionId */
    private $id;

    /** @var TodoSectionName */
    private $name;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    private function __construct()
    {
    }
}
