<?php

namespace App\DDD\Presentation\Project;

use App\DDD\Domain\Project\Project;
use App\DDD\Presentation\Color\ColorResponse;
use App\DDD\Presentation\Response;
use App\DDD\Presentation\Todo\TodoResponse;
use App\DDD\Presentation\TodoSection\TodoSectionResponse;
use Carbon\Carbon;

class ProjectSuperficialResponse extends Response
{

    /** @var bool */
    public $favorite;

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var ColorResponse */
    public $color;

    /** @var array */
    public $sections;

    /** @var array */
    public $todo;

    /** @var Carbon */
    public $createdAt;

    /** @var Carbon */
    public $updatedAt;

    public function fill(bool $favorite, int $id, string $name, ColorResponse $color, array $sections, array $todos, Carbon $createdAt, Carbon $updatedAt)
    {
        $this->favorite = $favorite;
        $this->id = $id;
        $this->name = $name;
        $this->color = $color;
        $this->sections = array_map(function ($section) {
            $sectionResponse = new TodoSectionResponse();
            $sectionResponse->constructFrom($section);
            return $sectionResponse;
        }, $sections);
        $this->todos = array_map(function ($todo) {
            $todoResponse = new TodoResponse();
            $todoResponse->constructFrom($todo);
            return $todoResponse;
        }, $todos);
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
