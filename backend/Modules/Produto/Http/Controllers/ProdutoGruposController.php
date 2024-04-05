<?php

namespace Modules\Produto\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Produto\Http\Requests\Grupos\IDRequest;
use Modules\Produto\Http\Requests\Grupos\CreateRequest;
use Modules\Produto\Http\Requests\Grupos\UpdateRequest;
use Modules\Produto\Services\ServiceGrupos;

class ProdutoGruposController extends Controller
{
    protected $service;

    public function __construct(ServiceGrupos $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = $this->service->all();

        return $this->returnQuery($query);
    }

    public function paginate(Request $request)
    {
        $arr = $request->all();

        $query = $this->service->paginate($arr);

        return $this->returnQuery($query);
    }

    public function find(IDRequest $request)
    {
        $query = $this->service->find($request->get('id_produto_grupo'));

        return $this->returnQuery($query);
    }

    public function create(CreateRequest $request)
    {
        $arr = $request->all();

        $arr['id_empresa'] = $this->idEmpresa();

        $query = $this->service->create($arr);

        return $this->returnQuery($query);
    }

    public function update(UpdateRequest $request)
    {
        $arr = $request->all();

        $arr['id_empresa'] = $this->idEmpresa();

        $query = $this->service->update($arr['id_produto_grupo'], $arr);

        return $this->returnQuery($query);
    }

    public function destroy(IDRequest $request)
    {
        $query = $this->service->delete($request->get('id_produto_grupo'));

        return $this->returnQuery($query);
    }
}
