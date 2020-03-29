<?php

namespace App\DDD\Infrastructure\Project;

use App\DDD\Domain\Project\Project;

interface ProjectRepository
{
    public function save(Project $project): Project;
}
