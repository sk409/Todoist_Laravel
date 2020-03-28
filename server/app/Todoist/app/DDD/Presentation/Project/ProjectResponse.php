<?php

namespace App\DDD\Presentation\Project;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\Project\Project;
use App\DDD\Domain\Project\ProjectFavorite;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\Project\ProjectName;
use App\DDD\Domain\UpdatedAt;

class ProjectResponse
{

    /** @var ProjectFavorite */
    public $favorite;

    /** @var ProjectId */
    public $id;

    /** @var ProjectName */
    public $name;

    /** @var CreatedAt */
    public $createdAt;

    /** @var UpdatedAt */
    public $updatedAt;

    public function constructFrom(Project $project)
    {
        $this->favorite = ProjectFavorite::create($project->getFavorite()->getValue());
        $this->id = ProjectId::create($project->getId()->getValue());
        $this->name = ProjectName::create($project->getName()->getValue());
        $this->createdAt = CreatedAt::create($project->getCreatedAt()->getValue());
        $this->updatedAt = UpdatedAt::create($project->getUpdatedAt()->getValue());
    }
}
