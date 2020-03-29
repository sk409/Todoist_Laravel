<?php

namespace App\DDD\Infrastructure\TodoSection;

use App\DDD\Domain\TodoSection\TodoSection;

interface TodoSectionRepository
{

    public function save(TodoSection $todoSection): TodoSection;
}
