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

    public function forHomeAll(array $options)
    {
        $options["with"] = $this->memberForHome();
        return $this->projectRepository->findAll($options);
    }

    public function forHomeOne(array $options)
    {
        $options["with"] = $this->memberForHome();
        return $this->projectRepository->findOne($options);
    }

    public function repository(): Repository
    {
        return $this->projectRepository;
    }

    private function memberForHome(): array
    {
        return ["color", "sections", "todos" => function ($query) {
            $query->whereNull("completed_at")->whereNull("section_id");
        }];
    }
}
