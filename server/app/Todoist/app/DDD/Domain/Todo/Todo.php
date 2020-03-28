<?php

namespace App\DDD\Domain\Todo;

use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\Priority\PriorityId;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\TodoSection\TodoSectionId;
use App\DDD\Domain\TodoStatus\TodoStatus;
use App\DDD\Domain\TodoStatus\TodoStatusId;
use App\DDD\Domain\TodoStatus\TodoStatusState;
use App\DDD\Domain\UpdatedAt;
use App\DDD\Domain\User\TodoId;
use App\Exceptions\BusinessRequirementsException;
use Carbon\Carbon;

class Todo
{

    public static function create(TodoContent $content, TodoDueDate $dueDate, PriorityId $priorityId, ProjectId $projectId, TodoSectionId $sectionId, TodoStatus $status)
    {
        if (!$status->getState()->isCreated()) {
            throw new BusinessRequirementsException("Todo must be created in an incomplete state");
        }
        $todo = new Todo();
        $todo->content = $content;
        $todo->dueDate = $dueDate;
        $todo->status = $status;
        $todo->priorityId = $priorityId;
        $todo->projectId = $projectId;
        $todo->sectionId = $sectionId;
    }

    public static function reconstructFromStorage(TodoCompletedAt $completedAt, TodoContent $content, TodoDueDate $dueDate, TodoId $id, TodoStatus $status, PriorityId $priorityId, ProjectId $projectId, TodoSectionId $sectionId, CreatedAt $createdAt, UpdatedAt $updatedAt)
    {
        $todo = new Todo();
        $todo->completedAt = $completedAt;
        $todo->content = $content;
        $todo->dueDate = $dueDate;
        $todo->id = $id;
        $todo->status = $status;
        $todo->priorityId = $priorityId;
        $todo->projectId = $projectId;
        $todo->sectionId = $sectionId;
        $todo->createdAt = $createdAt;
        $todo->updatedAt = $updatedAt;
    }

    /** @var TodoCompletedAt */
    private $completedAt;

    /** @var TodoContent */
    private $content;

    /** @var TodoDueDate */
    private $dueDate;

    /** @var TodoId */
    private $id;

    /** @var TodoStatus */
    private $status;

    /** @var PriorityId */
    private $priorityId;

    /** @var ProjectId */
    private $projectId;

    /** @var TodoSectionId */
    private $sectionId;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    public function complete()
    {
        if (!$this->status->getState()->canComplete()) {
            throw new BusinessRequirementsException("cannot complete todo which is in " . $this->status->getState()->getValue() . "state: ");
        }
        $this->completedAt = new Carbon();
        $this->status->complete();
    }

    public function getCompletedAt(): ?TodoCompletedAt
    {
        return $this->completedAt;
    }

    public function getContent(): TodoContent
    {
        return $this->content;
    }

    public function setContent(TodoContent $content)
    {
        $this->content = $content;
    }

    public function getDueDate(): ?TodoDueDate
    {
        return $this->dueDate;
    }

    public function setDueDate(TodoDueDate $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function getId(): TodoId
    {
        return $this->id;
    }

    public function getStatusId(): TodoStatusId
    {
        return $this->status->getId();
    }

    public function getStatusState(): TodoStatusState
    {
        return $this->status->getState();
    }

    public function getStatusCreatedAt(): CreatedAt
    {
        return $this->status->getCreatedAt();
    }

    public function getStatusUpdatedAt(): UpdatedAt
    {
        return $this->status->getUpdatedAt();
    }

    public function getPriorityId(): PriorityId
    {
        return $this->priorityId;
    }

    public function setPriorityId(PriorityId $priorityId)
    {
        $this->priorityId = $priorityId;
    }

    public function getProjectId(): ProjectId
    {
        return $this->projectId;
    }

    public function setProjectId(ProjectId $projectId)
    {
        $this->projectId = $projectId;
    }

    public function getSectionId(): TodoSectionId
    {
        return $this->sectionId;
    }

    public function setSectionId(TodoSectionId $sectionId)
    {
        $this->sectionId = $sectionId;
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
