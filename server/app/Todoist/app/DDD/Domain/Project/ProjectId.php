<?php

namespace App\DDD\Domain\Project;

use App\DDD\Domain\Id;
use App\Exceptions\BusinessRequirementsException;

class ProjectId extends Id
{
    public static function create(int $id): ProjectId
    {
        if (!self::validate($id)) {
            throw new BusinessRequirementsException("id should be an integer value greater than or equal to " . self::MIN . ": " . $id);
        }
        $object = new ProjectId();
        $object->id = $id;
        return $object;
    }
}
