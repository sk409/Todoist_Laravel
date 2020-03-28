<?php

namespace App\DDD\Service\QueryService\Project;

use App\DDD\Domain\Project\Project;
use App\DDD\Domain\User\UserId;
use App\DDD\Infrastructure\Query\Project\ProjectQuery;

class ProjectQueryService
{

    /** @var ProjectQuery */
    private $projectQuery;

    public function __construct(ProjectQuery $projectQuery)
    {
        $this->projectQuery = $projectQuery;
    }

    public function findDefaultByUserIdSuperficial(UserId $userId): Project
    {
        return $this->projectQuery->findDefaultByUserIdSuperficial($userId);
    }
}
