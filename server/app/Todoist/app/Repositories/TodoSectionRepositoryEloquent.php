<?php

declare(strict_types=1);

namespace App\Repositories;

use App\TodoSection;

class TodoSectionRepositoryEloquent extends RepositoryEloquent implements TodoSectionRepository
{

    public function __construct()
    {
        parent::__construct(TodoSection::class);
    }
}
