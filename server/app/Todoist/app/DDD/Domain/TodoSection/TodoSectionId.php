<?php

namespace App\DDD\Domain\TodoSection;

use App\DDD\Domain\Id;
use App\Exceptions\BusinessRequirementsException;

class TodoSectionId extends Id
{
    public static function create(int $id): TodoSectionId
    {
        if (!self::validate($id)) {
            throw new BusinessRequirementsException("id should be an integer value greater than or equal to " . self::MIN . ": " . $id);
        }
        $object = new TodoSectionId();
        $object->id = $id;
        return $object;
    }
}
