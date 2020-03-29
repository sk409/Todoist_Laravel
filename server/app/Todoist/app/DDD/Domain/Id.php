<?php

namespace App\DDD\Domain;

use App\Exceptions\BusinessRequirementsException;

class Id extends ValueObject
{
    public const MIN = 1;

    public static function validate(int $id): bool
    {
        return !validator([$id], ["min:" . self::MIN])->fails();
    }

    /** @var int */
    protected $id;

    public function getValue(): int
    {
        return $this->id;
    }

    protected function __construct()
    {
    }
}
