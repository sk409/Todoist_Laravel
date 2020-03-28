<?php

namespace App\DDD\Domain\TodoStatus;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;
use App\Exceptions\BusinessRequirementsException;

class TodoStatus
{

    public static function create(TodoStatusState $state)
    {
        $this->state = $state;
    }

    public static function reconstructFromStorage(TodoStatusId $id, TodoStatusState $state, CreatedAt $createdAt, UpdatedAt $updatedAt)
    {
        $this->id = $id;
        $this->state = $state;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /** @var TodoStatusId */
    private $id;

    /** @var TodoStatusState */
    private $state;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    public function complete()
    {
        if (!$this->state->canComplete()) {
            throw new BusinessRequirementsException("cannot transition to completed state");
        }
        $this->state = TodoStatusState::completed();
    }

    public function incomplete()
    {
        if (!$this->state->canIncomplete()) {
            throw new BusinessRequirementsException("cannot transition to created state");
        }
        $this->state = TodoStatusState::created();
    }

    public function getId(): TodoStatusId
    {
        return $this->id;
    }

    public function getState(): TodoStatusState
    {
        return $this->state;
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
