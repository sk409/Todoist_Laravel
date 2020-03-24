<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoStoreRequest;
use App\Services\TodoService;

class TodosController extends ResourceController
{

    public function __construct(TodoService $todoService)
    {
        parent::__construct($todoService);
    }

    public function store(TodoStoreRequest $request)
    {
        return $this->service->create($request->all());
    }
}
