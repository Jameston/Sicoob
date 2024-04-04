<?php

namespace Modules\Usuario\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Pessoa\Services\ServicePessoa;
use Modules\Usuario\Http\Requests\CreateRequest;
use Modules\Usuario\Http\Requests\IDRequest;
use Modules\Usuario\Http\Requests\UpdateRequest;
use Modules\Usuario\Services\ServiceUsuario;

class UsuarioController extends Controller
{
    protected $service;

    protected $servicePessoa;

    public function __construct(
        ServiceUsuario $serviceUsuario,
        ServicePessoa $servicePessoa
    ) {
        $this->service = $serviceUsuario;
        $this->servicePessoa = $servicePessoa;
    }

    public function index(Request $request)
    {
        $arr = $request->all();
        $arr['id_empresa'] = $this->idEmpresa();

        $query = $this->service->paginate($arr);

        return $this->returnQuery($query);
    }

    public function find(IDRequest $request)
    {
        $query = $this->service->find($request->get('id_usuario'), 'id_usuario');

        return $this->returnQuery($query);
    }

    public function create(CreateRequest $request)
    {
        $arr = $request->all();

        $arr['password'] = bcrypt($arr['password']);
        $arr['id_empresa'] = $this->idEmpresa();

        $query = $this->service->create($arr);

        if (isset($arr['id_empresa'])) {
            $this->service->createUsuarioEmpresa([
                'id_empresa' => $arr['id_empresa'],
                'id_usuario' => $query['data']->id_usuario
            ]);
        }

        if (isset($arr['id_pessoa'])) {
            $this->service->createUsuarioCliente([
                'id_pessoa' => $arr['id_pessoa'],
                'id_usuario' => $query['data']->id_usuario
            ]);
        }

        return $this->returnQuery($query);
    }

    public function update(UpdateRequest $request)
    {
        $arr = $request->all();

        if (isset($arr['password'])) {
            $arr['password'] = bcrypt($arr['password']);
        }

        $query = $this->service->update($arr['id_usuario'], $arr);
        $query['data'] = $arr;

        return $this->returnQuery($query);
    }

    public function destroy(IDRequest $request)
    {
        $arr = $request->all();

        $query = $this->service->delete($arr['id_usuario']);

        return $this->returnQuery($query);
    }
}
