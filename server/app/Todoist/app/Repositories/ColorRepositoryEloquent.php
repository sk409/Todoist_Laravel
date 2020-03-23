<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Color;

class ColorRepositoryEloquent extends RepositoryEloquent implements ColorRepository
{

    public function __construct()
    {
        parent::__construct(Color::class);
    }
}
