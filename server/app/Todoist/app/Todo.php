<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ["completed_at", "content", "due_date", "project_id", "priority_id", "section_id"];
}
