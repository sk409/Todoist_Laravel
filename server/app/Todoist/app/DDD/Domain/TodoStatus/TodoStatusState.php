<?php

namespace App\DDD\Domain\TodoStatus;

use App\Exceptions\BusinessRequirementsException;

class TodoStatusState
{

    public const MAX_LENGTH = 32;

    public const CREATED = "Created";
    public const COMPLETED = "Completed";

    public static function created(): TodoStatusState
    {
        $todoStatusState = new TodoStatusState();
        $todoStatusState->state = self::CREATED;
        return $todoStatusState;
    }

    public static function completed(): TodoStatusState
    {
        $todoStatusState = new TodoStatusState();
        $todoStatusState->state = self::COMPLETED;
        return $todoStatusState;
    }

    public static function validate($state): bool
    {
        return !validator([$state], ["max:" . self::MAX_LENGTH])->fails();
    }

    /** @var string */
    private $state;

    public function canComplete(): bool
    {
        return $this->state === self::CREATED;
    }

    public function canIncomplete(): bool
    {
        return $this->state === self::COMPLETED;
    }

    public function isCompleted(): bool
    {
        return $this->state === self::COMPLETED;
    }

    public function isCreated(): bool
    {
        return $this->state === self::CREATED;
    }

    public function getValue(): string
    {
        return $this->state;
    }

    private function __construct()
    {
    }
}
