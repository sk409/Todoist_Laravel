<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\User\UserId;
use App\DDD\Infrastructure\Color\ColorRepository;
use App\DDD\Presentation\Color\ColorResponse;
use App\DDD\Presentation\Project\Query\ProjectQuery;
use App\DDD\Service\QueryService\Project\ProjectQueryService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /** @var ColorRepository */
    private $colorRepository;

    /** @var ProjectQuery */
    private $projectQuery;

    public function __construct(ColorRepository $colorRepository, ProjectQuery $projectQuery)
    {
        $this->colorRepository = $colorRepository;
        $this->projectQuery = $projectQuery;
    }

    public function home()
    {
        $user = Auth::user();
        $defaultColor = $this->colorRepository->findByHex(ColorHex::create("808080"));
        $defaultColorResponse = new ColorResponse();
        $defaultColorResponse->constructFrom($defaultColor);
        $defaultProjectResponse = $this->projectQuery->findDefaultByUserIdSuperficial(UserId::create($user->id));
        return view('home', ["defaultColor" => $defaultColorResponse, "defaultProject" => $defaultProjectResponse]);
    }
}
