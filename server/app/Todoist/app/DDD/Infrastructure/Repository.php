<?php

namespace App\DDD\Infrastructure;

class Repository
{
    public function makeParams(array $params): array
    {
        $result = [];
        foreach ($params as $key => $value) {
            if (is_null($value)) {
                continue;
            }
            $result[$key] = $value->getValue();
        }
        return $result;
    }
}
