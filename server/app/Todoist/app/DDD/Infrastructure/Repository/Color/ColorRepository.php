<?php

namespace App\DDD\Infrastructure\Repository\Color;

use App\DDD\Domain\Color\Color;
use App\DDD\Domain\Color\ColorHex;

interface ColorRepository
{
    public function all(): array;
    public function findByHex(ColorHex $colorHex): ?Color;
}
