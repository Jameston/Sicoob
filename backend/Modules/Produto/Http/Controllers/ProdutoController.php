<?php

namespace Modules\Produto\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Pessoa\Http\Requests\CodigoRequest;
use Modules\Produto\Http\Requests\IDRequest;
use Modules\Produto\Http\Requests\CreateRequest;
use Modules\Produto\Http\Requests\UpdateRequest;
use Modules\Produto\Services\ServiceProduto;

class ProdutoController extends Controller
{
    protected $service;

    public function __construct(ServiceProduto $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->paginate($request);

        return $this->returnQuery($query);
    }

    public function find(IDRequest $request)
    {
        $query = $this->service->getProdutoDados($request->get('id_produto'));

        return $this->returnQuery($query);
    }

    public function create(CreateRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->createProduto($arr);

        return $this->returnQuery($query);
    }

    public function update(UpdateRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->updateProduto($arr);

        return $this->returnQuery($query);
    }

    public function destroy(IDRequest $request)
    {
        $query = $this->service->delete($request->get('id_produto'));

        return $this->returnQuery($query);
    }

    public function getByCodigo(CodigoRequest $request)
    {
        $query = $this->service->getByCodigo($request->get('codigo'));

        return $this->returnQuery($query);
    }
}
