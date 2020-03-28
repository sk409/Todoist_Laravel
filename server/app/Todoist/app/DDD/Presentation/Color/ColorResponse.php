<?php

namespace App\DDD\Presentation\Color;

use App\DDD\Domain\Color\Color as ColorDomain;
use App\DDD\Presentation\Response;
use Carbon\Carbon;

class ColorResponse extends Response
{

    /** @var string */
    public $hex;

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var Carbon */
    public $createdAt;

    /** @var Carbon */
    public $updatedAt;

    public function constructFrom(ColorDomain $color)
    {
        $this->hex = $color->getHex()->getValue();
        $this->id = $color->getId()->getValue();
        $this->name = $color->getName()->getValue();
        $this->createdAt = $color->getCreatedAt()->getValue();
        $this->updatedAt = $color->getUpdatedAt()->getValue();
    }
}
