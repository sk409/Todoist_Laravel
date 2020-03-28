<?php

namespace App\DDD\Domain\User;

use App\DDD\Domain\Email;
use App\Exceptions\BusinessRequirementsException;

class UserEmail extends Email
{
    public static function create(string $email): UserEmail
    {
        if (!self::validate($email)) {
            throw new BusinessRequirementsException("passed email has invalid format: " . $email);
        }
        $object = new UserEmail();
        $object->email = $email;
        return $object;
    }
}
