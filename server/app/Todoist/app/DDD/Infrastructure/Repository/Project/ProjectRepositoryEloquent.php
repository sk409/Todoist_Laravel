<?php

namespace App\DDD\Infrastructure\Repository\Project;

use App\DDD\Domain\Color\ColorId;
use App\DDD\Domain\Project\Project as ProjectDomain;
use App\DDD\Domain\Project\ProjectFavorite;
use App\DDD\Domain\Project\ProjectName;
use App\DDD\Domain\User\UserId;
use App\Project as ProjectEloquent;

class ProjectRepositoryEloquent implements ProjectRepository
{

    public function save(ProjectFavorite $favorite, ProjectName $name, ColorId $colorId, UserId $userId): ProjectDomain
    {
        return ProjectEloquent::create([
            "favorite" => (int) $favorite->getValue(),
            "name" => $name->getValue(),
            "color_id" => $colorId->getValue(),
            "user_id" => $userId->getValue()
        ])->toDomain();
    }
}
