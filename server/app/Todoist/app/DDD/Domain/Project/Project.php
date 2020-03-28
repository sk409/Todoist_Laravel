<?php

namespace App\DDD\Domain\Project;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;

class Project
{

    public static function create(ProjectFavorite $favorite, ProjectName $name): Project
    {
        $project = new Project();
        $project->favorite = $favorite;
        $project->name = $name;
        return $project;
    }

    public static function reconstructFromStorage(ProjectFavorite $favorite, ProjectId $id, ProjectName $name, CreatedAt $createdAt, UpdatedAt $updatedAt): Project
    {
        $project = new Project();
        $project->favorite = $favorite;
        $project->id = $id;
        $project->name = $name;
        $project->createdAt = $createdAt;
        $project->updatedAt = $updatedAt;
        return $project;
    }

    /** @var ProjectFavorite */
    private $favorite;

    /** @var ProjectId */
    private $id;

    /** @var ProjectName */
    private $name;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    public function getFavorite(): ProjectFavorite
    {
        return $this->favorite;
    }

    public function setFavorite(ProjectFavorite $favorite)
    {
        $this->favorite = $favorite;
    }

    public function getId(): ProjectId
    {
        return $this->id;
    }

    public function getName(): ProjectName
    {
        return $this->name;
    }

    public function setName(ProjectName $name)
    {
        $this->name = $name;
    }

    public function getCreatedAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    private function __construct()
    {
    }
}
