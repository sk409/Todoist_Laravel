<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoSection extends Model
{
    protected $fillable = ["name", "project_id"];
}
