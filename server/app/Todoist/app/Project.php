<?php

declare(strict_types=1);

namespace App;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\Project\Project as ProjectDomain;
use App\DDD\Domain\Project\ProjectFavorite;
use App\DDD\Domain\Project\ProjectId;
use App\DDD\Domain\Project\ProjectName;
use App\DDD\Domain\UpdatedAt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = ["favorite", "name", "color_id", "user_id"];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(TodoSection::class);
    }

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public function toDomain(): ProjectDomain
    {
        return ProjectDomain::reconstructFromStorage(ProjectFavorite::create((bool) $this->favorite), ProjectId::create($this->id), ProjectName::create($this->name), CreatedAt::create($this->created_at), UpdatedAt::create($this->updated_at));
    }
}
