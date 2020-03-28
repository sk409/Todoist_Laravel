<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RepositoryEloquent implements Repository
{

    private $eloquent;

    public function __construct(string $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function all()
    {
        return call_user_func($this->eloquent . "::all")->all();
    }

    public function count(array $where): int
    {
        if (empty($where)) {
            return call_user_func($this->eloquent . "::all")->count();
        }
        $buder = $this->where($where);
        return $buder->count();
    }

    public function create(array $params)
    {
        return call_user_func($this->eloquent . "::create", $this->snakeCase($params));
    }

    public function findAll(array $option)
    {
        return $this->find($option)->all();
    }

    public function findOne(array $option)
    {
        return $this->find($option)->first();
    }

    public function first()
    {
        return call_user_func($this->eloquent . "::first");
    }

    public function update(int $id, array $params)
    {
        call_user_func($this->eloquent . "::find", $id)->update($this->snakeCase($params));
    }

    private function find(array $option): Collection
    {
        $builder = null;
        if (isset($option["with"])) {
            $with = $option["with"];
            if (is_null($builder)) {
                $builder = call_user_func($this->eloquent . "::with", $with);
            } else {
                $builder = $builder->with($with);
            }
        }
        if (isset($option["primary"])) {
            $primary = $option["primary"];
            if (is_null($builder)) {
                $builder = call_user_func($this->eloquent . "::find", $primary);
            } else {
                $builder = $builder->find($primary);
            }
        }
        if (isset($option["where"])) {
            $where = $option["where"];
            $builder = $this->where($where, $builder);
        }
        if (isset($option["sort"])) {
            $sort = $option["sort"];
            foreach ($sort as $s) {
                $key = $s[0];
                $direction = count($s) === 1 ? "asc" : $s[1];
                if (is_null($builder)) {
                    $builder = call_user_func($this->eloquent . "::orderBy", $key, $direction);
                } else {
                    $builder = $builder->orderBy($key, $direction);
                }
            }
        }
        if (isset($option["offset"])) {
            $offset = $option["offset"];
            if (is_null($builder)) {
                $builder = call_user_func($this->eloquent . "::offset", $offset);
            } else {
                $builder = $builder->offset($offset);
            }
        }
        if (isset($option["limit"])) {
            $limit = $option["limit"];
            if (is_null($limit)) {
                $builder = call_user_func($this->eloquent . "::limit", $limit);
            } else {
                $builder = $builder->limit($limit);
            }
        }
        return $builder->get();
    }

    private function snakeCase(array $params): array
    {
        $result = [];
        foreach ($params as $key => $param) {
            $result[snake_case($key)] = $param;
        }
        return $result;
    }

    private function where(array $where, $builder = null): Builder
    {
        $call = function ($lhs, $operation, $rhs) use (&$builder) {
            if (is_null($builder)) {
                if (is_null($rhs)) {
                    $builder = call_user_func($this->eloquent . "::whereNull", $lhs);
                } else {
                    $builder = call_user_func($this->eloquent . "::where", $lhs, $operation, $rhs);
                }
            } else {
                if (is_null($rhs)) {
                    $builder = $builder->whereNull($lhs);
                } else {
                    $builder = $builder->where($lhs, $operation, $rhs);
                }
            }
        };
        $narrowDown = function ($query) use ($call) {
            $lhs = snake_case($query[0]);
            $operation = count($query) === 2 ? "=" : $query[1];
            $rhs = count($query) === 2 ? $query[1] : $query[2];
            $call($lhs, $operation, $rhs);
        };
        if (count($where) === 3 && gettype($where[0]) === "string" && gettype($where[1]) === "string") {
            $narrowDown($where);
        } else if (count($where) === 2 && isset($where[0]) && gettype($where[0] === "string")) {
            $narrowDown($where);
        } else {
            foreach ($where as $key => $value) {
                if (gettype($key) === "integer") {
                    $narrowDown($value);
                } else {
                    $key = snake_case($key);
                    if (is_null($value)) {
                        $call($key, null, null);
                    } else {
                        $call($key, "=", $value);
                    }
                }
            }
        }
        return $builder;
    }
}
