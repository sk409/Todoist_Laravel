<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Repository;
use App\Repositories\TodoRepository;

class TodoServiceDefault implements TodoService
{

    use ResourceServiceTrait;

    private $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function repository(): Repository
    {
        return $this->todoRepository;
    }
}
