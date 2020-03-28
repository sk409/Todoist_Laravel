<?php

namespace App\DDD\Infrastructure\Query\Project;

use App\DDD\Domain\Project\Project;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\User\UserId;

interface ProjectQuery
{
    public function findByIdSuperficial(ProjectId $projectId): ?Project;
    public function findDefaultByUserIdSuperficial(UserId $userId): Project;
}
