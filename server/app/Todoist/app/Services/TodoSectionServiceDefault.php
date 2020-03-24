<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Repository;
use App\Repositories\TodoSectionRepository;

class TodoSectionServiceDefault implements TodoSectionService
{

    use ResourceServiceTrait;

    private $todoSectionRepository;

    public function __construct(TodoSectionRepository $todoSectionRepository)
    {
        $this->todoSectionRepository = $todoSectionRepository;
    }

    public function repository(): Repository
    {
        return $this->todoSectionRepository;
    }
}
