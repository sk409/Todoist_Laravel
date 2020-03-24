<?php

declare(strict_types=1);

namespace App\Repositories;

interface Repository
{
    public function all();
    public function create(array $params);
    public function findAll(array $options);
    public function findOne(array $options);
    public function first();
}
