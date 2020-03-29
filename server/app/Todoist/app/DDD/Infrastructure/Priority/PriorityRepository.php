<?php

namespace App\DDD\Infrastructure\Priority;

use App\DDD\Domain\Priority\Priority;
use App\DDD\Domain\Priority\PriorityHex;
use App\DDD\Domain\Priority\PriorityName;

interface PriorityRepository
{
    public function save(Priority $priority): Priority;
}
