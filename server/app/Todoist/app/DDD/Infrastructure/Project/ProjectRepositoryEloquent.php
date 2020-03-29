<?php

namespace App\DDD\Infrastructure\Project;

use App\DDD\Domain\Project\Project as ProjectDomain;
use App\Project as ProjectEloquent;

class ProjectRepositoryEloquent implements ProjectRepository
{
    public function save(ProjectDomain $project): ProjectDomain
    {
        return ProjectEloquent::create([
            "favorite" => $project->getFavorite()->getValue(),
            "name" => $project->getName()->getValue(),
            "color_id" => $project->getColorId()->getValue(),
            "user_id" => $project->getUserId()->getValue(),
        ])->toDomain();
    }
}
