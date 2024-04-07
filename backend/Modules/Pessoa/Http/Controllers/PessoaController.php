<?php

namespace Modules\Pessoa\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Pessoa\Http\Requests\CodigoRequest;
use Modules\Pessoa\Http\Requests\IDRequest;
use Modules\Pessoa\Http\Requests\CreateRequest;
use Modules\Pessoa\Http\Requests\UpdateRequest;
use Modules\Pessoa\Services\ServicePessoa;

class PessoaController extends Controller
{
    protected $service;

    public function __construct(ServicePessoa $service) {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->paginate($request->all());

        return $this->returnQuery($query);
    }

    public function find(IDRequest $request)
    {
        $query = $this->service->getPessoaDados($request->get('id_pessoa'));

        return $this->returnQuery($query);
    }

    public function getByCodigo(CodigoRequest $request)
    {
        $query = $this->service->getByCodigo($request->get('codigo'));

        return $this->returnQuery($query);
    }

    public function getByNome(Request $request)
    {
        $query = $this->service->getByNome($request->get('nome'), $this->idEmpresa());

        return $this->returnQuery($query);
    }

    public function create(CreateRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->createPessoa($arr);

        return $this->returnQuery($query);
    }

    public function update(UpdateRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->updatePessoa($arr);

        return $this->returnQuery($query);
    }

    public function destroy(IDRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->delete($arr['id_pessoa']);

        return $this->returnQuery($query);
    }

    public function getPessoaTipo()
    {
        $query = $this->service->getPessoaTipo();

        return $this->returnQuery($query);
    }
}
