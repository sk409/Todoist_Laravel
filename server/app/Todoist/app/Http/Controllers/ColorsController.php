<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ColorService;

class ColorsController extends ResourceController
{

    public function __construct(ColorService $colorService)
    {
        parent::__construct($colorService);
    }
}
