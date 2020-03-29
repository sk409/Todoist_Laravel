<?php

namespace App\DDD\Domain;

class Email extends ValueObject
{
    public const MAX_LENGTH = 255;

    public static function validate($email): bool
    {
        return !validator([$email], ["email|max:" . self::MAX_LENGTH])->fails();
    }

    /** @var string */
    protected $email;

    public function getValue(): string
    {
        return $this->email;
    }

    protected function __construct()
    {
    }
}
