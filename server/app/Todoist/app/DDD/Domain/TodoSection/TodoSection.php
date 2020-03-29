<?php

namespace App\DDD\Domain\TodoSection;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\UpdatedAt;

class TodoSection
{
    public static function create(TodoSectionName $name, ProjectId $projectId): TodoSection
    {
        $todoSection = new TodoSection();
        $todoSection->name = $name;
        $todoSection->projectId = $projectId;
        return $todoSection;
    }

    public static function reconstructFromStorage(TodoSectionId $id, TodoSectionName $name, ProjectId $projectId, CreatedAt $createdAt, UpdatedAt $updatedAt): TodoSection
    {
        $todoSection = new TodoSection();
        $todoSection->id = $id;
        $todoSection->name = $name;
        $todoSection->projectId = $projectId;
        $todoSection->createdAt = $createdAt;
        $todoSection->updatedAt = $updatedAt;
        return $todoSection;
    }

    /** @var TodoSectionId */
    private $id;

    /** @var TodoSectionName */
    private $name;

    /** @var ProjectId */
    private $projectId;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    public function getId(): TodoSectionId
    {
        return $this->id;
    }

    public function getName(): TodoSectionName
    {
        return $this->name;
    }

    public function setName(TodoSectionName $name)
    {
        $this->name = $name;
    }

    public function getProjectId(): ProjectId
    {
        return $this->projectId;
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
