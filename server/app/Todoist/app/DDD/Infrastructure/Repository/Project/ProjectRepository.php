<?php

namespace App\DDD\Infrastructure\Repository\Project;

use App\DDD\Domain\Color\ColorId;
use App\DDD\Domain\Project\Project;
use App\DDD\Domain\Project\ProjectFavorite;
use App\DDD\Domain\Project\ProjectName;
use App\DDD\Domain\User\UserId;

interface ProjectRepository
{
    public function save(ProjectFavorite $favorite, ProjectName $projectName, ColorId $colorId, UserId $userId): Project;
}
