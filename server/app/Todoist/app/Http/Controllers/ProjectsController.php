<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends ResourceController
{

    public function __construct(ProjectService $projectService)
    {
        parent::__construct($projectService);
    }

    public function store(ProjectStoreRequest $request)
    {
        $params = $request->all();
        $params["userId"] = Auth::user()->id;
        return $this->service->create($params);
    }

    public function user()
    {
        $where = ["userId" => Auth::user()->id];
        $options = ["where" => $where];
        return $this->service->findAll($options);
    }
}
