<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DDD\Domain\Color\ColorId;
use App\DDD\Domain\Project\ProjectFavorite;
use App\DDD\Domain\Project\ProjectName;
use App\DDD\Domain\User\UserId;
use App\DDD\Infrastructure\Repository\Project\ProjectRepository;
use App\DDD\Presentation\Project\ProjectResponse;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

    /** @var ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function store(ProjectStoreRequest $request): ProjectResponse
    {
        info($request->colorId);
        info(gettype($request->colorId));
        $project = $this->projectRepository->save(
            ProjectFavorite::create((bool) $request->favorite),
            ProjectName::create($request->name),
            ColorId::create($request->colorId),
            UserId::create(Auth::user()->id)
        );
        $projectResponse = new ProjectResponse();
        $projectResponse->constructFrom($project);
        return $projectResponse;
    }
}
