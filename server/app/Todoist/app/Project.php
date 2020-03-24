<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = ["favorite", "name", "color_id", "user_id"];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
