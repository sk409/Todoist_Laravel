<?php

namespace App;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\TodoStatus\TodoStatus as TodoStatusDomain;
use App\DDD\Domain\TodoStatus\TodoStatusId;
use App\DDD\Domain\TodoStatus\TodoStatusState;
use App\DDD\Domain\UpdatedAt;
use Illuminate\Database\Eloquent\Model;

class TodoStatus extends Model
{
    protected $fillable = ["state"];

    public function toDomain(): TodoStatusDomain
    {
        return TodoStatusDomain::reconstructFromStorage(
            TodoStatusId::create($this->id),
            TodoStatusState::reconstructFromStorage($this->state),
            CreatedAt::create($this->created_at),
            UpdatedAt::create($this->updated_at)
        );
    }
}
