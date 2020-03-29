<?php

namespace App\DDD\Infrastructure\TodoStatus;

use App\DDD\Domain\TodoStatus\TodoStatus;

interface TodoStatusRepository
{
    public function save(TodoStatus $todoStatus): TodoStatus;
}
