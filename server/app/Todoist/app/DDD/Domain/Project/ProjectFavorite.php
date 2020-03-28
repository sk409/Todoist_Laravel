<?php

namespace App\DDD\Domain\Project;

class ProjectFavorite
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
