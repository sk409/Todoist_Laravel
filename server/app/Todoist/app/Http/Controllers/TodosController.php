<?php

namespace App\Http\Controllers;

use App\DDD\Domain\Priority\PriorityId;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\Todo\Todo;
use App\DDD\Domain\Todo\TodoContent;
use App\DDD\Domain\Todo\TodoDueDate;
use App\DDD\Domain\TodoSection\TodoSectionId;
use App\DDD\Infrastructure\Todo\TodoRepository;
use App\DDD\Presentation\Todo\TodoResponse;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;

class TodosController extends Controller
{

    /** @var TodoRepository */
    private $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function store(TodoStoreRequest $request)
    {
        $todo = $this->todoRepository->save(Todo::create(
            TodoContent::create($request->content),
            is_null($request->dueDate) ? null : TodoDueDate::create($request->dueDate),
            is_null($request->priorityId) ? null : PriorityId::create($request->priorityId),
            ProjectId::create($request->projectId),
            is_null($request->sectionId) ? null : TodoSectionId::create($request->sectionId)
        ));
        $todoResponse = new TodoResponse();
        $todoResponse->constructFrom($todo);
        return $todoResponse;
    }

    public function update(int $id, TodoUpdateRequest $request)
    {
        return $this->service->update($id, $request->all());
    }
}
