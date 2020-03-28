<?php

namespace App\Services;

interface ProjectService extends ResourceService
{
    public function forHomeAll(array $options);
    public function forHomeOne(array $options);
}
