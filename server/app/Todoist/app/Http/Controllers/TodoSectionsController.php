<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TodoSectionStoreRequest;
use App\Services\TodoSectionService;
use Illuminate\Http\Request;

class TodoSectionsController extends ResourceController
{

    public function __construct(TodoSectionService $todoSectionService)
    {
        parent::__construct($todoSectionService);
    }

    public function forHomeAll(Request $request)
    {
        $options = ["where" => $request->all()];
        return $this->service->forHomeAll($options);
    }

    public function forHomeOne(Request $request)
    {
        $options = ["where" => $request->all()];
        return $this->service->forHomeOne($options);
    }

    public function store(TodoSectionStoreRequest $request)
    {
        return $this->service->create($request->all());
    }
}
