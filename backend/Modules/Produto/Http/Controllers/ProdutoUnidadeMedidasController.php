<?php

namespace Modules\Produto\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Pessoa\Http\Requests\CodigoRequest;
use Modules\Produto\Http\Requests\UnidadeMedidas\IDRequest;
use Modules\Produto\Http\Requests\UnidadeMedidas\CreateRequest;
use Modules\Produto\Http\Requests\UnidadeMedidas\UpdateRequest;
use Modules\Produto\Services\ServiceUnidadeMedidas;

class ProdutoUnidadeMedidasController extends Controller
{
    protected $service;

    public function __construct(ServiceUnidadeMedidas $service)
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
        $query = $this->service->find($request->get('id_uni_medida'));

        return $this->returnQuery($query);
    }

    public function create(CreateRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->create($arr);

        return $this->returnQuery($query);
    }

    public function update(UpdateRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->update($arr['id_uni_medida'], $arr);

        return $this->returnQuery($query);
    }

    public function destroy(IDRequest $request)
    {
        $query = $this->service->delete($request->get('id_uni_medida'));

        return $this->returnQuery($query);
    }
    
    public function getByCodigo(CodigoRequest $request)
    {
        $query = $this->service->getByCodigo($request->get('codigo'));

        return $this->returnQuery($query);
    }
}
