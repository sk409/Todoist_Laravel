<?php

namespace App\DDD\Presentation\TodoSection;

use App\DDD\Domain\TodoSection\TodoSection;
use App\DDD\Presentation\Response;

class TodoSectionResponse extends Response
{

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var Carbon */
    public $createdAt;

    /** @var Carbon */
    public $updatedAt;

    public function constructFrom(TodoSection $todoSection)
    {
        $this->id = $todoSection->getId()->getValue();
        $this->name = $todoSection->getName()->getValue();
        $this->createdAt = $todoSection->getCreatedAt()->getValue();
        $this->updatedAt = $todoSection->getUpdatedAt()->getValue();
    }
}
