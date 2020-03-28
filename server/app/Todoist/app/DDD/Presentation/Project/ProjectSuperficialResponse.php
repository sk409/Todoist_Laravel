<?php

namespace App\DDD\Presentation\Project;

use App\DDD\Domain\Project\Project;
use Carbon\Carbon;

class ProjectSuperficialResponse
{

    /** @var bool */
    public $favorite;

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var Carbon */
    public $createdAt;

    /** @var Carbon */
    public $updatedAt;

    public function constructFrom(Project $project)
    {
        $this->favorite = $project->getFavorite()->getValue();
        $this->id = $project->getId()->getValue();
        $this->name = $project->getName()->getValue();
        $this->createdAt = $project->getCreatedAt()->getValue();
        $this->updatedAt = $project->getUpdatedAt()->getValue();
    }
}
