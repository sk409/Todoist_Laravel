<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ColorRepository;
use App\Repositories\Repository;

class ColorServiceDefault implements ColorService
{

    use ResourceServiceTrait;

    private $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function repository(): Repository
    {
        return $this->colorRepository;
    }
}
