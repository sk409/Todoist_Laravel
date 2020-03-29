<?php

namespace App\DDD\Service\UseCase\Project;

use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\Project\Project;
use App\DDD\Domain\Project\ProjectFavorite;
use App\DDD\Domain\Project\ProjectName;
use App\DDD\Domain\User\UserId;
use App\DDD\Infrastructure\Color\ColorRepository;
use App\DDD\Infrastructure\Project\ProjectRepository;

class StoreDefaultProjectUseCase
{
    private $colorRepository;
    private $projectRepository;

    public function __construct(ColorRepository $colorRepository, ProjectRepository $projectRepository)
    {
        $this->colorRepository = $colorRepository;
        $this->projectRepository = $projectRepository;
    }

    public function execute(UserId $userId): Project
    {
        $defaultColor = $this->colorRepository->findByHex(ColorHex::create("808080"));
        return $this->projectRepository->save(Project::create(
            ProjectFavorite::create(false),
            ProjectName::create("インボックス"),
            $defaultColor->getId(),
            $userId
        ));
    }
}
