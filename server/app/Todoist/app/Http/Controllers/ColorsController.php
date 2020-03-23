<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ColorRepository;
use Illuminate\Http\Request;

class ColorsController extends Controller
{

    public function __construct(ColorRepository $colorRepository)
    {
        parent::__construct($colorRepository);
    }
}
