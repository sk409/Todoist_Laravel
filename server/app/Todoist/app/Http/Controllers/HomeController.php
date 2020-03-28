<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\User\UserId;
use App\DDD\Infrastructure\Repository\Color\ColorRepository;
use App\DDD\Presentation\Color\ColorResponse;
use App\DDD\Presentation\Project\ProjectSuperficialResponse;
use App\DDD\Service\QueryService\Project\ProjectQueryService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /** @var ColorRepository */
    private $colorRepository;

    /** @var ProjectQueryService */
    private $projectQueryService;

    public function __construct(ColorRepository $colorRepository, ProjectQueryService $projectQueryService)
    {
        $this->colorRepository = $colorRepository;
        $this->projectQueryService = $projectQueryService;
    }

    public function home()
    {
        $user = Auth::user();
        $defaultColor = $this->colorRepository->findByHex(ColorHex::create("808080"));
        $defaultColorResponse = new ColorResponse();
        $defaultColorResponse->constructFrom($defaultColor);
        $defaultProject = $this->projectQueryService->findDefaultByUserIdSuperficial(UserId::create($user->id));
        $defaultProjectResponse = new ProjectSuperficialResponse();
        $defaultProjectResponse->constructFrom($defaultProject);
        return view('home', ["defaultColor" => $defaultColorResponse, "defaultProject" => $defaultProjectResponse]);
    }
}
