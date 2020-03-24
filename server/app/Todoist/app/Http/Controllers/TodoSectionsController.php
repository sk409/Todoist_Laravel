<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TodoSectionStoreRequest;
use App\Services\TodoSectionService;

class TodoSectionsController extends ResourceController
{

    private $todoSectionService;

    public function __construct(TodoSectionService $todoSectionService)
    {
        $this->todoSectionService = $todoSectionService;
    }

    public function store(TodoSectionStoreRequest $request)
    {
        return $this->todoSectionService->create($request->all());
    }
}
