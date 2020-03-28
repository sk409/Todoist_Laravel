<?php

namespace App\DDD\Domain\User;

use App\DDD\Domain\Id;
use App\Exceptions\BusinessRequirementsException;

class UserId extends Id
{
    public static function create(int $id): UserId
    {
        if (!self::validate($id)) {
            throw new BusinessRequirementsException("id should be an integer value greater than or equal to " . self::MIN . ": " . $id);
        }
        $object = new UserId();
        $object->id = $id;
        return $object;
    }
}
