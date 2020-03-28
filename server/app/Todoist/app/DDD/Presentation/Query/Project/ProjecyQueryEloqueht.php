<?php

namespace App\DDD\Infrastructure\Query\Project;

use App\DDD\Domain\Project\Project as ProjectDomain;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\User\UserId;
use App\Project as ProjectEloquent;

class ProjectQueryEloquent implements ProjectQuery
{

    public function findByIdSuperficial(ProjectId $projectId): ?ProjectDomain
    {
        $eloquent = ProjectEloquent::where("id", $projectId->getValue())->with($this->memberSuperficial())->get()->first();
        if (is_null($eloquent)) {
            return null;
        }
        return $eloquent->toDomain();
    }

    public function findDefaultByUserIdSuperficial(UserId $userId): ProjectDomain
    {
        return ProjectEloquent::where("user_id", $userId->getValue())->orderBy("id")->with($this->memberSuperficial())->get()->first()->toDomain();
    }

    public function memberSuperficial(): array
    {
        return ["color", "sections", "todos" => function ($query) {
            $query->whereNull("completed_at")->whereNull("section_id");
        }];
    }
}
