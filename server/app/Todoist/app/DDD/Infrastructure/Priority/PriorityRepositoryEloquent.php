<?php

namespace App\DDD\Infrastructure\Priority;

use App\DDD\Domain\Priority\Priority as PriorityDomain;
use App\Priority;

class PriorityRepositoryEloquent implements PriorityRepository
{
    public function save(PriorityDomain $priorityDomain): PriorityDomain
    {
        $eloquent = Priority::create([
            "hex" => $priorityDomain->getHex()->getValue(),
            "name" => $priorityDomain->getName()->getValue()
        ]);
        return $eloquent->toDomain();
    }
}
