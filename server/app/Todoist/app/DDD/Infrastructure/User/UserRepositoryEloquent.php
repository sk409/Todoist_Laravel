<?php

namespace App\DDD\Infrastructure\User;

use App\DDD\Domain\User\User as UserDomain;
use App\User as UserEloquent;

class UserRepositoryEloquent implements UserRepository
{
    public function save(UserDomain $userDomain): UserDomain
    {
        return UserEloquent::create([
            "email" => $userDomain->getEmail()->getValue(),
            "password" => $userDomain->getHashedPassword()->getValue(),
            "name" => $userDomain->getName()->getValue()
        ])->toDomain();
    }
}
