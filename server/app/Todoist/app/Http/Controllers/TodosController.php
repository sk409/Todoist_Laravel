<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Services\TodoService;

class TodosController extends ResourceController
{

    public function __construct(TodoService $todoService)
    {
        parent::__construct($todoService);
    }

    public function forHomeCompleted(Request $request) {
        $where = $request->all();
        $where["completed_at"] = null;
        $options = ["where" => $where];
        return $this->service->forHomeAll($options);
    }

    public function store(TodoStoreRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function update(int $id, TodoUpdateRequest $request) {
        return $this->service->update($id, $request->all());
    }
}
