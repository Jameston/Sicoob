<?php

namespace Modules\Pessoa\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Pessoa\Http\Requests\CodigoRequest;
use Modules\Pessoa\Http\Requests\IDRequest;
use Modules\Pessoa\Http\Requests\CreateRequest;
use Modules\Pessoa\Http\Requests\UpdateRequest;
use Modules\Pessoa\Services\ServicePessoa;

class PessoaController extends Controller
{

    protected $servicePessoa;

    /**
     * PessoaController constructor.
     * @param ServiceEmpresa $servicePessoa
     */
    public function __construct(
        ServicePessoa $servicePessoa
    ) {
        $this->service = $servicePessoa;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        dd('teste');
        $query = $this->service->paginate($request->all());

        return $this->returnQuery($query);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function find(IDRequest $request)
    {
        $query = $this->service->getPessoaDados($request->get('id_pessoa'));

        return $this->returnQuery($query);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getByNome(Request $request)
    {
        $query = $this->service->getByNome($request->get('nome'), $this->idEmpresa());

        return $this->returnQuery($query);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(CreateRequest $request)
    {
        $arr = $request->all();
        $arr['id_empresa'] = $this->idEmpresa();

        $query = $this->service->createPessoa($arr);

        return $this->returnQuery($query);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function update(UpdateRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->updatePessoa($arr);

        return $this->returnQuery($query);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(IDRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->delete($arr['id_pessoa']);

        return $this->returnQuery($query);
    }
}
