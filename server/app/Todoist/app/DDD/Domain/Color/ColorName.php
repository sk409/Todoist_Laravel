<?php

namespace App\DDD\Domain\Color;

use App\Exceptions\BusinessRequirementsException;

class ColorName
{

    const MAX_LENGTH = 32;

    public static function create(string $name): ColorName
    {
        if (!self::validate($name)) {
            throw new BusinessRequirementsException("name length should be " . self::MAX_LENGTH . "characters or less");
        }
        $object = new ColorName();
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
