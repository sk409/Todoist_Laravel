<?php

declare(strict_types=1);

namespace App\Services;

interface TodoSectionService extends ResourceService
{
    public function forHomeAll(array $options);
    public function forHomeOne(array $options);
}
