<?php

namespace App\Services;

use App\Repositories\Repository;

trait ResourceServiceTrait
{

    abstract public function repository(): Repository;

    public function all()
    {
        return $this->repository()->all();
    }

    public function create(array $params)
    {
        return $this->repository()->create($params);
    }

    public function findAll(array $options)
    {
        return $this->repository()->findAll($options);
    }

    public function findOne(array $options)
    {
        return $this->repository()->findOne($options);
    }

    public function first()
    {
        return $this->repository()->first();
    }

    public function update($id, array $params) {
        return $this->repository()->update($id, $params);
    }
}
