<?php

namespace App\DDD\Domain\Project;

use App\DDD\Domain\Color\ColorId;
use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;
use App\DDD\Domain\User\UserId;

class Project
{
    public static function create(ProjectFavorite $favorite, ProjectName $name, ColorId $colorId, UserId $userId): Project
    {
        $project = new Project();
        $project->favorite = $favorite;
        $project->name = $name;
        $project->colorId = $colorId;
        $project->userId = $userId;
        return $project;
    }

    public static function reconstructFromStorage(ProjectFavorite $favorite, ProjectId $id, ProjectName $name, ColorId $colorId, UserId $userId, CreatedAt $createdAt, UpdatedAt $updatedAt): Project
    {
        $project = new Project();
        $project->favorite = $favorite;
        $project->id = $id;
        $project->name = $name;
        $project->colorId = $colorId;
        $project->userId = $userId;
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

    /** @var ColorId */
    private $colorId;

    /** @var UserId */
    private $userId;

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

    public function getColorId(): ColorId
    {
        return $this->colorId;
    }

    public function setColorId(ColorId $colorId)
    {
        $this->colorId = $colorId;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function setUserId(UserId $userId)
    {
        $this->userId = $userId;
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
