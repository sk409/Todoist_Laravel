<?php

namespace App\DDD\Domain\TodoStatus;

use App\DDD\Domain\Id;
use App\Exceptions\BusinessRequirementsException;

class TodoStatusId extends Id
{
    public static function create(int $id): TodoStatusId
    {
        if (!self::validate($id)) {
            throw new BusinessRequirementsException("id should be an integer value greater than or equal to " . self::MIN . ": " . $id);
        }
        $object = new TodoStatusId();
        $object->id = $id;
        return $object;
    }
}
