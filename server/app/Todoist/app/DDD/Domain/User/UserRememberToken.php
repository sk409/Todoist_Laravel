<?php

namespace App\DDD\Domain\User;

use App\DDD\Domain\ValueObject;
use App\Exceptions\BusinessRequirementsException;

class UserRememberToken extends ValueObject
{
    public const MAX_LENGTH = 100;

    public static function create(?string $token): UserRememberToken
    {
        if (!self::validate($token)) {
            throw new BusinessRequirementsException("token length should be " . self::MAX_LENGTH . "characters or less");
        }
        $object = new UserRememberToken();
        $object->token = $token;
        return $object;
    }

    public static function validate(?string $token): bool
    {
        return !validator([$token], ["max:" . self::MAX_LENGTH])->fails();
    }

    /** @var string */
    private $token;

    public function getValue(): string
    {
        return $this->token;
    }

    private function __construct()
    {
    }
}
