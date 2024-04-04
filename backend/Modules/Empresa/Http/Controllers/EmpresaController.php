<?php

namespace Modules\Empresa\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Empresa\Http\Requests\CreateRequest;
use Modules\Empresa\Http\Requests\IDRequest;
use Modules\Empresa\Services\Empresa;

class EmpresaController extends Controller
{
    protected $service;

    public function __construct(Empresa $service)
    {
        $this->service = $service;
    }

    public function index(IDRequest $request)
    {
        $query = $this->service->find($this->getUserId());

        return $this->returnQuery($query);
    }

    public function create(CreateRequest $request)
    {
        $query = $this->service->create($request->all());

        return $this->returnQuery($query);
    }

    public function update(IDRequest $request)
    {
        $query = $this->service->update($this->getUserId(), $request->all());

        return $this->returnQuery($query);
    }
}
