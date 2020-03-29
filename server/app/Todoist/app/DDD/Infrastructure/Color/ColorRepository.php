<?php

namespace App\DDD\Infrastructure\Color;

use App\DDD\Domain\Color\Color;
use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\Color\ColorName;

interface ColorRepository
{
    public function all(): array;
    public function findByHex(ColorHex $colorHex): ?Color;
    public function save(Color $color): Color;
}
