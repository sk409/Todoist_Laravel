<?php

namespace App\DDD\Domain\Color;


use App\Exceptions\BusinessRequirementsException;

class ColorHex
{

    public const LENGTH = 6;

    public static function create(string $hex): ColorHex
    {
        if (!self::validateFormat($hex)) {
            throw new BusinessRequirementsException("hex should be Hexadecimal: " . $hex);
        }
        if (!self::validateLength($hex)) {
            throw new BusinessRequirementsException("hex should be exactly " . self::LENGTH . ": " . $hex);
        }
        $object = new ColorHex();
        $object->hex = $hex;
        return $object;
    }

    public static function validateLength(string $hex): bool
    {
        return !validator([$hex], ["size:" . self::LENGTH])->fails();
    }

    public static function validateFormat(string $hex): bool
    {
        return ctype_xdigit($hex);
    }

    /** @var string */
    private $hex;

    public function getValue(): string
    {
        return $this->hex;
    }

    private function __construct()
    {
    }
}
