<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Priority;

class PriorityRepositoryEloquent extends RepositoryEloquent implements PriorityRepository
{

    public function __construct()
    {
        parent::__construct(Priority::class);
    }
}
