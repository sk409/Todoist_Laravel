<?php

namespace App\DDD\Infrastructure\Repository\User;

use App\DDD\Domain\User\User;
use App\DDD\Domain\User\UserEmail;
use App\DDD\Domain\User\UserHashedPassword;
use App\DDD\Domain\User\UserName;

interface UserRepository
{
    public function save(UserEmail $email, UserHashedPassword $hashedPassword, UserName $name): User;
}
