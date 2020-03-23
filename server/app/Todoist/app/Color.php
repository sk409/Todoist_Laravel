<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ["name", "hex"];
}
