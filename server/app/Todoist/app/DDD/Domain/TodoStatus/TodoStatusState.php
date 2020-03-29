<?php

namespace App\DDD\Domain\TodoStatus;

use App\DDD\Domain\ValueObject;

class TodoStatusState extends ValueObject
{
    public const MAX_LENGTH = 32;

    public const CREATED = "Created";
    public const COMPLETED = "Completed";

    public static function all(): array
    {
        return array_map(function ($state) {
            $object = new TodoStatusState();
            $object->state = $state;
            return $object;
        }, self::states());
    }

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

    public static function reconstructFromStorage(string $state)
    {
        $todoStatusState = new TodoStatusState();
        $todoStatusState->state = $state;
        return $todoStatusState;
    }

    public static function states(): array
    {
        return [self::CREATED, self::COMPLETED];
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
