<?php

namespace App;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\TodoSection\TodoSection as TodoSectionDomain;
use App\DDD\Domain\TodoSection\TodoSectionId;
use App\DDD\Domain\TodoSection\TodoSectionName;
use App\DDD\Domain\UpdatedAt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TodoSection extends Model
{
    protected $fillable = ["name", "project_id"];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class, "section_id");
    }

    public function toDomain(): TodoSectionDomain
    {
        return TodoSectionDomain::reconstructFromStorage(
            TodoSectionId::create($this->id),
            TodoSectionName::create($this->name),
            ProjectId::create($this->project_id),
            CreatedAt::create($this->created_at),
            UpdatedAt::create($this->updated_at)
        );
    }
}
