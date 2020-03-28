<?php

namespace App\DDD\Domain\Todo;

use App\Exceptions\BusinessRequirementsException;
use Illuminate\Support\Facades\Validator;

class TodoContent
{

    public const MAX_LENGTH = 1024;

    public static function create(string $content): TodoContent
    {
        if (!self::validate($content)) {
            throw new BusinessRequirementsException("content length should be" . self::MAX_LENGTH . "characters or less: " . $content);
        }
        $object = new TodoContent();
        $object->content = $content;
        return $object;
    }

    public static function validate($content): bool
    {
        return !Validator::make([$content], "max:")->fails();
    }

    /** @var string */
    private $content;

    public function getValue(): string
    {
        return $this->content;
    }

    private function __construct()
    {
    }
}
