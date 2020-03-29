<?php

namespace App\DDD\Domain\User;

use App\DDD\Domain\ValueObject;
use App\Exceptions\BusinessRequirementsException;

class UserHashedPassword extends ValueObject
{
    public const MAX_LENGTH = 255;

    public static function create($hashedPassword): UserHashedPassword
    {
        if (!self::validate($hashedPassword)) {
            throw new BusinessRequirementsException("hashedPassword length should be " . self::MAX_LENGTH . "characters or less");
        }
        $object = new UserHashedPassword();
        $object->hashedPassword = $hashedPassword;
        return $object;
    }

    public static function validate($hashedPassword): bool
    {
        return !validator([$hashedPassword], ["max:" . self::MAX_LENGTH])->fails();
    }

    /** @var string */
    private $hashedPassword;

    public function getValue(): string
    {
        return $this->hashedPassword;
    }

    private function __construct()
    {
    }
}
