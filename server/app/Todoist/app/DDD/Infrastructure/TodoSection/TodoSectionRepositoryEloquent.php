<?php

namespace App\DDD\Infrastructure\TodoSection;

use App\DDD\Domain\TodoSection\TodoSection as TodoSectionDomain;
use App\TodoSection as TodoSectionEloquent;

class TodoSectionRepositoryEloquent implements TodoSectionRepository
{

    public function save(TodoSectionDomain $todoSection): TodoSectionDomain
    {
        $eloquent = TodoSectionEloquent::create([
            "name" => $todoSection->getName()->getValue(),
            "project_id" => $todoSection->getProjectId()->getValue()
        ]);
        return $eloquent->toDomain();
    }
}
