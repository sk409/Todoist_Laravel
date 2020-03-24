<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Project;

class ProjectRepositoryEloquent extends RepositoryEloquent implements ProjectRepository
{

    public function __construct()
    {
        parent::__construct(Project::class);
    }
}
