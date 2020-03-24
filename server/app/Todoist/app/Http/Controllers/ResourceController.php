<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ResourceService;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    protected $service;

    public function __construct(ResourceService $service)
    {
        $this->service = $service;
    }

    public function findAll(Request $request)
    {
        if (empty($conditions)) {
            return $this->service->all();
        }
        $option = [
            "where" => $request->all()
        ];
        return $this->service->findAll($option);
    }

    public function findOne(Request $request)
    {
        if (empty($request->all())) {
            return $this->service->first();
        }
        $option = [
            "where" => $request->all()
        ];
        return $this->service->findOne($option);
    }

    public function index()
    {
        return $this->service->all();
    }
}
