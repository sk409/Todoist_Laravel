<?php

namespace App\DDD\Infrastructure\Todo;

use App\DDD\Domain\Todo\Todo as TodoDomain;
use App\DDD\Domain\TodoStatus\TodoStatusState;
use App\DDD\Infrastructure\Repository;
use App\Todo as TodoEloquent;
use App\TodoStatus;

class TodoRepositoryEloquent extends Repository implements TodoRepository
{
    public function save(TodoDomain $todoDomain): TodoDomain
    {
        $statusCreated = TodoStatus::where(["state" => TodoStatusState::CREATED])->first();
        $eloquent = TodoEloquent::create($this->makeParams([
            "completed_at" => $todoDomain->getCompletedAt(),
            "content" => $todoDomain->getContent(),
            "due_date" => $todoDomain->getDueDate(),
            "priority_id" => $todoDomain->getPriorityId(),
            "project_id" => $todoDomain->getProjectId(),
            "section_id" => $todoDomain->getSectionId(),
            "status_id" => $statusCreated->toDomain()->getId()
        ]));
        $eloquent = TodoEloquent::where("id", $eloquent->id)->with(TodoDomain::aggregateMembers())->get()->all()[0];
        return $eloquent->toDomain();
    }
}
