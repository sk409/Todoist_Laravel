<?php

namespace App\DDD\Domain\Color;

use App\DDD\Domain\Id;
use App\Exceptions\BusinessRequirementsException;

class ColorId extends Id
{
    public static function create(int $id): ColorId
    {
        if (!self::validate($id)) {
            throw new BusinessRequirementsException("id should be an integer value greater than or equal to " . self::MIN . ": " . $id);
        }
        $object = new ColorId();
        $object->id = $id;
        return $object;
    }
}
