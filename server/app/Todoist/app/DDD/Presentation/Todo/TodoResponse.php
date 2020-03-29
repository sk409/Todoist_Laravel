<?php

namespace App\DDD\Presentation\Todo;

use App\DDD\Domain\Todo\Todo;
use App\DDD\Presentation\Response;
use App\DDD\Presentation\TodoStatus\TodoStatusResponse;
use Carbon\Carbon;

class TodoResponse extends Response
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
        $this->completedAt = is_null($todo->getCompletedAt()) ? null : $todo->getCompletedAt()->getValue();
        $this->content = $todo->getContent()->getValue();
        $this->dueDate = is_null($todo->getDueDate()) ? null : $todo->getDueDate()->getValue();
        $this->id = $todo->getId()->getValue();
        $this->status = new TodoStatusResponse();
        $this->status->fill(
            $todo->getStatusId(),
            $todo->getStatusState(),
            $todo->getStatusCreatedAt(),
            $todo->getStatusUpdatedAt()
        );
        $this->priorityId = is_null($todo->getPriorityId()) ? null : $todo->getPriorityId()->getValue();
        $this->projectId = $todo->getProjectId()->getValue();
        $this->sectionId = is_null($todo->getSectionId()) ? null : $todo->getSectionId()->getValue();
        $this->createdAt = $todo->getCreatedAt()->getValue();
        $this->updatedAt = $todo->getUpdatedAt()->getValue();
    }
}
