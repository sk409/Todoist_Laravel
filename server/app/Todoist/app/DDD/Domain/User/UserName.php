<?php

namespace App\DDD\Domain\User;

use App\DDD\Domain\ValueObject;
use App\Exceptions\BusinessRequirementsException;

class UserName extends ValueObject
{
    public const MAX_LENGTH = 255;

    public static function create(string $name): UserName
    {
        if (!self::validate($name)) {
            throw new BusinessRequirementsException("name length should be " . self::MAX_LENGTH . "characters or less");
        }
        $object = new UserName();
        $object->name = $name;
        return $object;
    }

    public static function validate(string $name): bool
    {
        return !validator([$name], ["max:" . self::MAX_LENGTH])->fails();
    }

    /** @var string */
    private $name;

    public function getValue(): string
    {
        return $this->name;
    }

    private function __construct()
    {
    }
}
