<?php

namespace App\DDD\Presentation\Project\Query;

use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\User\UserId;
use App\DDD\Presentation\Color\ColorResponse;
use App\DDD\Presentation\Project\ProjectSuperficialResponse;
use App\Project;

class ProjectQueryEloquent implements ProjectQuery
{
    public function findByIdSuperficial(ProjectId $projectId): ?ProjectSuperficialResponse
    {
        $eloquent = Project::where("id", $projectId->getValue())->with($this->memberSuperficial())->get()->first();
        if (is_null($eloquent)) {
            return null;
        }
        return $this->constructSuperficialResponse($eloquent);
    }

    public function findByUserIdSuperficial(UserId $userId): array
    {
        $eloquents = Project::where("user_id", $userId->getValue())->with($this->memberSuperficial())->get()->all();
        return array_map(function ($eloquent) {
            return $this->constructSuperficialResponse($eloquent);
        }, $eloquents);
    }

    public function findDefaultByUserIdSuperficial(UserId $userId): ?ProjectSuperficialResponse
    {
        $eloquent = Project::where("user_id", $userId->getValue())->orderBy("id")->with($this->memberSuperficial())->get()->first();
        if (is_null($eloquent)) {
            return null;
        }
        return $this->constructSuperficialResponse($eloquent);
    }

    public function memberSuperficial(): array
    {
        return ["color", "sections", "todos" => function ($query) {
            $query->whereNull("completed_at")->whereNull("section_id");
        }];
    }

    private function constructSuperficialResponse(Project $eloquent): ProjectSuperficialResponse
    {
        $color = new ColorResponse();
        $color->constructFrom($eloquent->color->toDomain());
        $sections = array_map(function ($section) {
            return $section->toDomain();
        }, $eloquent->sections->all());
        $todos = array_map(function ($todo) {
            return $todo->toDomain();
        }, $eloquent->todos->all());
        $projectSuperficialResponse = new ProjectSuperficialResponse();
        $projectSuperficialResponse->fill($eloquent->favorite, $eloquent->id, $eloquent->name, $color, $sections, $todos, $eloquent->created_at, $eloquent->updated_at);
        return $projectSuperficialResponse;
    }
}
