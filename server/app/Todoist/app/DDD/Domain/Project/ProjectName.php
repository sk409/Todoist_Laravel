<?php

namespace App\DDD\Domain\Project;

use App\DDD\Domain\ValueObject;
use App\Exceptions\BusinessRequirementsException;

class ProjectName extends ValueObject
{
    public const MAX_LENGTH = 256;

    public static function create(string $name)
    {
        if (!self::validate($name)) {
            throw new BusinessRequirementsException("name length should be " . self::MAX_LENGTH . "characters or less");
        }
        $object = new ProjectName();
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
