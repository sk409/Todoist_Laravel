<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        parent::__construct($projectRepository);
        $this->projectRepository = $projectRepository;
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $params["user_id"] = Auth::user()->id;
        return $this->projectRepository->create($params);
    }
}
