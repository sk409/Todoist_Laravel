<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\TodoSection\TodoSection;
use App\DDD\Domain\TodoSection\TodoSectionName;
use App\DDD\Infrastructure\TodoSection\TodoSectionRepository;
use App\DDD\Presentation\TodoSection\TodoSectionResponse;
use App\Http\Requests\TodoSectionStoreRequest;

class TodoSectionsController extends Controller
{

    /** @var TodoSectionRepository */
    private $todoSectionRepository;

    public function __construct(TodoSectionRepository $todoSectionRepository)
    {
        $this->todoSectionRepository = $todoSectionRepository;
    }

    public function store(TodoSectionStoreRequest $request): TodoSectionResponse
    {
        $todoSection = $this->todoSectionRepository->save(TodoSection::create(
            TodoSectionName::create($request->name),
            ProjectId::create((int) $request->projectId)
        ));
        $todoSectionResponse = new TodoSectionResponse();
        $todoSectionResponse->constructFrom($todoSection);
        return $todoSectionResponse;
    }
}
