<?php

namespace App\DDD\Domain\User;

use App\DDD\Domain\Id;
use App\Exceptions\BusinessRequirementsException;

class TodoId extends Id
{
    public static function create(int $id): TodoId
    {
        if (!self::validate($id)) {
            throw new BusinessRequirementsException("id should be an integer value greater than or equal to " . self::MIN . ": " . $id);
        }
        $object = new TodoId();
        $object->id = $id;
        return $object;
    }
}
