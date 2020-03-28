<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DDD\Infrastructure\Repository\Color\ColorRepository;
use App\DDD\Presentation\Color\ColorResponse;

class ColorsController
{

    private $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function index(): array
    {
        $colors = $this->colorRepository->all();
        $colorResponses = array_map(function ($color) {
            $colorResponse = new ColorResponse();
            $colorResponse->constructFrom($color);
            return $colorResponse;
        }, $colors);
        return $colorResponses;
    }
}
