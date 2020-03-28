<?php

namespace App\DDD\Infrastructure\Query\Project;

use App\DDD\Domain\Project\Project;
use App\DDD\Domain\User\UserId;

interface ProjectQuery
{
    public function findDefaultByUserIdSuperficial(UserId $userId): Project;
}
