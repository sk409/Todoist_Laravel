<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Todo;

class TodoRepositoryEloquent extends RepositoryEloquent implements TodoRepository
{

    public function __construct()
    {
        parent::__construct(Todo::class);
    }
}
