<?php

namespace App\DDD\Domain;

class Email
{

    public static function validate($email): bool
    {
        return !validator([$email], ["email"])->fails();
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
