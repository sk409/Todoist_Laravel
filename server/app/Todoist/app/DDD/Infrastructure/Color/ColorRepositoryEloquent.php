<?php

namespace App\DDD\Infrastructure\Color;

use App\Color as ColorEloquent;
use App\DDD\Domain\Color\Color as ColorDomain;
use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\Color\ColorName;

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

    public function save(ColorDomain $colorDomain): ColorDomain
    {
        $eloquent = ColorEloquent::create([
            "hex" => $colorDomain->getHex()->getValue(),
            "name" => $colorDomain->getName()->getValue()
        ]);
        return $eloquent->toDomain();
    }
}
