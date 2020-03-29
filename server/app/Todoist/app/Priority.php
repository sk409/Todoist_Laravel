<?php

namespace App;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\Priority\Priority as PriorityDomain;
use App\DDD\Domain\Priority\PriorityHex;
use App\DDD\Domain\Priority\PriorityId;
use App\DDD\Domain\Priority\PriorityName;
use App\DDD\Domain\UpdatedAt;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = "priority";

    protected $fillable = ["name", "hex"];

    public function toDomain(): PriorityDomain
    {
        return PriorityDomain::reconstructFromStorage(PriorityHex::create($this->hex), PriorityId::create($this->id), PriorityName::create($this->name), CreatedAt::create($this->created_at), UpdatedAt::create($this->updated_at));
    }
}
