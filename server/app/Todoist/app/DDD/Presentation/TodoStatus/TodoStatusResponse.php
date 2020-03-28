<?php

namespace App\DDD\Presentation\TodoStatus;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\TodoStatus\TodoStatus as TodoStatusDomain;
use App\DDD\Domain\TodoStatus\TodoStatusId;
use App\DDD\Domain\TodoStatus\TodoStatusState;
use App\DDD\Domain\UpdatedAt;
use App\DDD\Presentation\Response;
use Carbon\Carbon;

class TodoStatusResponse extends Response
{

    /** @var int */
    public $id;

    /** @var string */
    public $state;

    /** @var Carbon */
    public $createdAt;

    /** @var Carbon */
    public $updatedAt;

    public function constructFrom(TodoStatusDomain $todoStatus)
    {
        $this->id = $todoStatus->getId()->getValue();
        $this->state = $todoStatus->getState()->getValue();
        $this->createdAt = $todoStatus->getCreatedAt()->getValue();
        $this->updatedAt = $todoStatus->getUpdatedAt()->getValue();
    }

    public function fill(TodoStatusId $id, TodoStatusState $state, CreatedAt $createdAt, UpdatedAt $updatedAt)
    {
        $this->id = $id->getValue();
        $this->state = $state->getValue();
        $this->createdAt = $createdAt->getValue();
        $this->updatedAt = $updatedAt->getValue();
    }
}
