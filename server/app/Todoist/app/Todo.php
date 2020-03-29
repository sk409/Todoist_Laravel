<?php

namespace App;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\Priority\PriorityId;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\Todo\Todo as TodoDomain;
use App\DDD\Domain\Todo\TodoCompletedAt;
use App\DDD\Domain\Todo\TodoContent;
use App\DDD\Domain\Todo\TodoDueDate;
use App\DDD\Domain\TodoSection\TodoSectionId;
use App\DDD\Domain\TodoStatus\TodoStatus as TodoStatusDomain;
use App\DDD\Domain\TodoStatus\TodoStatusId;
use App\DDD\Domain\TodoStatus\TodoStatusState;
use App\DDD\Domain\UpdatedAt;
use App\DDD\Domain\User\TodoId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $fillable = ["completed_at", "content", "due_date", "project_id", "priority_id", "section_id", "status_id"];

    public function status(): BelongsTo
    {
        return $this->belongsTo(TodoStatus::class);
    }

    public function toDomain(): TodoDomain
    {
        $status = TodoStatusDomain::reconstructFromStorage(
            TodoStatusId::create($this->status->id),
            TodoStatusState::reconstructFromStorage($this->status->state),
            CreatedAt::create($this->status->created_at),
            UpdatedAt::create($this->status->updated_at)
        );
        return TodoDomain::reconstructFromStorage(
            is_null($this->completed_at) ? null : TodoCompletedAt::create($this->completed_at),
            TodoContent::create($this->content),
            is_null($this->due_data) ? null : TodoDueDate::create($this->due_date),
            TodoId::create($this->id),
            $status,
            is_null($this->priority_id) ? null : PriorityId::create($this->priority_id),
            ProjectId::create($this->project_id),
            is_null($this->section_id) ? null : TodoSectionId::create($this->section_id),
            CreatedAt::create($this->created_at),
            UpdatedAt::create($this->updated_at)
        );
    }
}
