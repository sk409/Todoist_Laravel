<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DDD\Domain\Color\ColorId;
use App\DDD\Domain\Project\Project;
use App\DDD\Domain\Project\ProjectFavorite;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\Project\ProjectName;
use App\DDD\Domain\User\UserId;
use App\DDD\Presentation\Project\Query\ProjectQuery;
use App\DDD\Infrastructure\Project\ProjectRepository;
use App\DDD\Presentation\Project\ProjectResponse;
use App\DDD\Presentation\Project\ProjectSuperficialResponse;
use App\Http\Requests\ProjectFindByIdSuperficialRequest;
use App\Http\Requests\ProjectFindByUserIdSuperficial;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

    /** @var ProjectQuery */
    private $projectQuery;

    /** @var ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectQuery $projectQuery, ProjectRepository $projectRepository)
    {
        $this->projectQuery = $projectQuery;
        $this->projectRepository = $projectRepository;
    }

    public function store(ProjectStoreRequest $request): ProjectResponse
    {
        $project = $this->projectRepository->save(Project::create(
            ProjectFavorite::create((bool) $request->favorite),
            ProjectName::create($request->name),
            ColorId::create((int) $request->colorId),
            UserId::create(Auth::user()->id)
        ));
        $projectResponse = new ProjectResponse();
        $projectResponse->constructFrom($project);
        return $projectResponse;
    }

    public function findByIdSuperficial(ProjectFindByIdSuperficialRequest $request): ?ProjectSuperficialResponse
    {
        return $this->projectQuery->findByIdSuperficial(ProjectId::create((int) $request->id));
    }

    public function findByUserIdSuperficial(ProjectFindByUserIdSuperficial $request): array
    {
        return $this->projectQuery->findByUserIdSuperficial(UserId::create((int)$request->userId));
    }
}
