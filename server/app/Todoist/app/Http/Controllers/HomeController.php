<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ColorService;
use App\Services\ProjectService;
use App\Services\TodoService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $colorService;
    private $projectService;
    private $todoService;

    public function __construct(ColorService $colorService, ProjectService $projectService, TodoService $todoService)
    {
        $this->colorService = $colorService;
        $this->projectService = $projectService;
        $this->todoService = $todoService;
    }

    public function home()
    {
        $user = Auth::user();
        $defaultColor = $this->colorService->findOne([
            "where" => ["hex", "808080"]
        ]);
        $defaultProject = $this->projectService->findOne([
            "sort" => [["id"]],
            "where" => ["userId", $user->id],
        ]);
        $todos = $this->todoService->findAll(([
            "where" => ["projectId" => $defaultProject->id, "sectionId" => null]
        ]));
        $defaultProject->todos = $todos;
        return view('home', ["defaultColor" => $defaultColor, "defaultProject" => $defaultProject]);
    }
}
