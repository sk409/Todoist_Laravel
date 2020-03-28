<?php

namespace App\DDD\Infrastructure\Repository\Color;

use App\Color as ColorEloquent;
use App\DDD\Domain\Color\Color as ColorDomain;
use App\DDD\Domain\Color\ColorHex;

class ColorRepositoryEloquent implements ColorRepository
{

    public function all(): array
    {
        $eloquents = ColorEloquent::all()->all();
        return array_map(function ($eloquent) {
            return $eloquent->toDomain();
        }, $eloquents);
    }

    public function findByHex(ColorHex $colorHex): ?ColorDomain
    {
        $eloquent = ColorEloquent::where(["hex" => $colorHex->getValue()])->first();
        if (is_null($eloquent)) {
            return null;
        }
        return $eloquent->toDomain();
    }
}
