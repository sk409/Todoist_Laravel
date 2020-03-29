<?php

namespace App\DDD\Presentation\Project\Query;

use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\User\UserId;
use App\DDD\Presentation\Project\ProjectSuperficialResponse;

interface ProjectQuery
{
    public function findByIdSuperficial(ProjectId $projectId): ?ProjectSuperficialResponse;
    public function findByUserIdSuperficial(UserId $userId): array;
    public function findDefaultByUserIdSuperficial(UserId $userId): ?ProjectSuperficialResponse;
}
