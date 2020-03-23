<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }


    public function findAll(Request $request)
    {
        if (empty($conditions)) {
            return $this->repository->all();
        }
        $option = [
            "where" => $request->all()
        ];
        return $this->repository->findAll($option);
    }

    public function findOne(Request $request)
    {
        if (empty($request->all())) {
            return $this->repository->first();
        }
        $option = [
            "where" => $request->all()
        ];
        return $this->repository->findOne($option);
    }

    public function index()
    {
        return $this->repository->all();
    }
}
