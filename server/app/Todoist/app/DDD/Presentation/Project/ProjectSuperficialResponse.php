<?php

namespace App\DDD\Presentation\Project;

use App\DDD\Domain\Project\Project;
use App\DDD\Presentation\Color\ColorResponse;
use App\DDD\Presentation\Response;
use Carbon\Carbon;

class ProjectSuperficialResponse extends Response
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

    /** @var ColorResponse */
    public $color;

    public function constructFrom(Project $project)
    {
        $this->favorite = $project->getFavorite()->getValue();
        $this->id = $project->getId()->getValue();
        $this->name = $project->getName()->getValue();
        $this->createdAt = $project->getCreatedAt()->getValue();
        $this->updatedAt = $project->getUpdatedAt()->getValue();
        // $this->color = new ColorResponse();
        //$this->color->constructFrom($project->)
    }
}
