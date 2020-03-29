<?php

namespace App\DDD\Infrastructure\Todo;

use App\DDD\Domain\Todo\Todo;

interface TodoRepository
{
    public function save(Todo $todo): Todo;
}
