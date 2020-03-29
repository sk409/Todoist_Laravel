<?php

namespace App\DDD\Domain\Project;

use App\DDD\Domain\ValueObject;

class ProjectFavorite extends ValueObject
{
    public static function create(bool $favorite): ProjectFavorite
    {
        $object = new ProjectFavorite();
        $object->favorite = $favorite;
        return $object;
    }

    /** @var bool */
    private $favorite;

    public function getValue(): bool
    {
        return $this->favorite;
    }

    private function __construct()
    {
    }
}
