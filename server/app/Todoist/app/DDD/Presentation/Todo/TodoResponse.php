<?php

namespace App\DDD\Presentation\Todo;

use App\DDD\Domain\Todo\Todo;
use App\DDD\Presentation\TodoStatus\TodoStatusResponse;
use Carbon\Carbon;

class TodoResponse
{

    /** @var Carbon */
    public $completedAt;

    /** @var string */
    public $content;

    /** @var Carbon */
    public $dueDate;

    /** @var int */
    public $id;

    /** @var TodoStatusResponse */
    public $status;

    /** @var int */
    public $priorityId;

    /** @var int */
    public $projectId;

    /** @var int */
    public $sectionId;

    /** @var Carbon */
    public $createdAt;

    /** @var Carbon */
    public $updatedAt;

    public function constructFrom(Todo $todo)
    {
        $this->completedAt = $todo->getCompletedAt()->getValue();
        $this->content = $todo->getContent()->getValue();
        $this->dueDate = $todo->getDueDate()->getValue();
        $this->id = $todo->getId()->getValue();
        $this->status = new TodoStatusResponse();
        $this->status->fill($todo->getStatusId(), $todo->getStatusState(), $todo->getStatusCreatedAt(), $todo->getStatusUpdatedAt());
        $this->priorityId = $todo->getPriorityId()->getValue();
        $this->projectId = $todo->getProjectId()->getValue();
        $this->sectionId = $todo->getSectionId()->getValue();
        $this->createdAt = $todo->getCreatedAt()->getValue();
        $this->updatedAt = $todo->getUpdatedAt()->getValue();
    }
}
