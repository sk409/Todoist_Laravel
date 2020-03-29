<?php

namespace App\DDD\Infrastructure\TodoStatus;

use App\DDD\Domain\TodoStatus\TodoStatus as TodoStatusDomain;
use App\TodoStatus as TodoStatusEloquent;

class TodoStatusRepositoryEloquent implements TodoStatusRepository
{
    public function save(TodoStatusDomain $todoStatusDomain): TodoStatusDomain
    {
        $eloquent = TodoStatusEloquent::create(["state" => $todoStatusDomain->getState()->getValue()]);
        return $eloquent->toDomain();
    }
}
