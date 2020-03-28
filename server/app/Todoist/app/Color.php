<?php

declare(strict_types=1);

namespace App;

use App\DDD\Domain\Color\Color as ColorDomain;
use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\Color\ColorId;
use App\DDD\Domain\Color\ColorName;
use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ["name", "hex"];

    public function toDomain(): ColorDomain
    {
        return ColorDomain::reconstructFromStorage(
            ColorHex::create($this->hex),
            ColorId::create($this->id),
            ColorName::create($this->name),
            CreatedAt::create($this->created_at),
            UpdatedAt::create($this->updated_at)
        );
    }
}
