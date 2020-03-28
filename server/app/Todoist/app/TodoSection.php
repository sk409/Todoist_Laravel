<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TodoSection extends Model
{
    protected $fillable = ["name", "project_id"];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class, "section_id");
    }
}
