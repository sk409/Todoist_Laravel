<?php

namespace App\DDD\Domain\Priority;

use App\Exceptions\BusinessRequirementsException;

class PriorityName
{

    const MAX_LENGTH = 32;

    public static function create(string $name): PriorityName
    {
        if (!self::validate($name)) {
            throw new BusinessRequirementsException("name length should be " . self::MAX_LENGTH . "characters or less");
        }
        $object = new PriorityName();
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
