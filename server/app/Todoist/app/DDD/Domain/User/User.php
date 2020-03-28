<?php

namespace App\DDD\Domain\User;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;
use Illuminate\Contracts\Auth\Authenticatable;

class User implements Authenticatable
{

    public static function create(UserEmail $email,  UserHashedPassword $hashedPassword, UserName $name): User
    {
        $user = new User();
        $user->email = $email;
        $user->hashedPassword = $hashedPassword;
        $user->name = $name;
        return $user;
    }

    public static function reconstructFromStorage(UserEmail $email,  UserHashedPassword $hashedPassword, UserId $id, UserName $name, UserRememberToken $rememberToken, CreatedAt $createdAt, UpdatedAt $updatedAt): User
    {
        $user = new User();
        $user->email = $email;
        $user->hashedPassword = $hashedPassword;
        $user->id = $id;
        $user->name = $name;
        $user->rememberToken = $rememberToken;
        $user->createdAt = $createdAt;
        $user->updatedAt = $updatedAt;
        return $user;
    }

    /** @var UserEmail */
    private $email;

    /** @var UserHashedPassword */
    private $hashedPassword;

    /** @var UserId */
    private $id;

    /** @var UserName */
    private $name;

    /** @var UserRememberToken */
    private $rememberToken;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    public function getAuthIdentifierName()
    {
        return "id";
    }

    public function getAuthIdentifier()
    {
        return $this->id->getValue();
    }

    public function getAuthPassword()
    {
        return $this->hashedPassword->getValue();
    }

    public function getRememberToken()
    {
        return $this->rememberToken->getValue();
    }

    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    public function getRememberTokenName()
    {
        return "rememberToken";
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function getHashedPassword(): UserHashedPassword
    {
        return $this->hashedPassword;
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    private function __construct()
    {
    }
}
