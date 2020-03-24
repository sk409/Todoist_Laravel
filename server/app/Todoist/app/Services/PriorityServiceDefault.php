<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PriorityRepository;
use App\Repositories\Repository;

class PriorityServiceDefault implements PriorityService
{

    use ResourceServiceTrait;

    private $priorityRepository;

    public function __construct(PriorityRepository $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
    }

    public function repository(): Repository
    {
        return $this->priorityRepository;
    }
}
