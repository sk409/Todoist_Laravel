<?php

namespace App\DDD\Infrastructure\Repository\User;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;
use App\DDD\Domain\User\User as UserDomain;
use App\DDD\Domain\User\UserEmail;
use App\DDD\Domain\User\UserHashedPassword;
use App\DDD\Domain\User\UserId;
use App\DDD\Domain\User\UserName;
use App\DDD\Domain\User\UserRememberToken;
use App\User as UserEloquent;

class UserRepositoryEloquent implements UserRepository
{

    public function save(UserEmail $email, UserHashedPassword $hashedPassword, UserName $name): UserDomain
    {
        return UserEloquent::create([
            "email" => $email->getValue(),
            "password" => $hashedPassword->getValue(),
            "name" => $name->getValue()
        ])->toDomain();
    }
}
