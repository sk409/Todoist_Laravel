<?php

namespace App\DDD\Infrastructure\User;

use App\DDD\Domain\User\User;

interface UserRepository
{
    public function save(User $user): User;
}
