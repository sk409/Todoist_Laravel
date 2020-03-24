<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ProjectRepository;
use App\Repositories\Repository;

class ProjectServiceDefault implements ProjectService
{

    use ResourceServiceTrait;

    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function repository(): Repository
    {
        return $this->projectRepository;
    }
}
