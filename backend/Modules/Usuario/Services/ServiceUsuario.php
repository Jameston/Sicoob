<?php

namespace Modules\Usuario\Services;

use App\Services\ServiceBase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Pessoa\Contracts\PessoaInterfaceRepository;
use Modules\Usuario\Contracts\UsuarioClienteInterfaceRepository;
use Modules\Usuario\Contracts\UsuarioEmpresaInterfaceRepository;
use Modules\Usuario\Contracts\UsuarioInterfaceRepository;

/**
 * Class ServiceUsuario
 * @package Modules\Usuario\Services
 */
class ServiceUsuario extends ServiceBase
{
    public $repository;

    public $repositoryUsuarioCliente;

    public $repositoryUsuarioEmpresa;

    public $repositoryPessoa;

    public $moduloEmpresaRepository;

    public function __construct(
        UsuarioInterfaceRepository $repository,
        UsuarioClienteInterfaceRepository $repositoryUsuarioCliente,
        UsuarioEmpresaInterfaceRepository $repositoryUsuarioEmpresa,
        PessoaInterfaceRepository $repositoryPessoa
    )
    {
        $this->repository = $repository;
        $this->repositoryUsuarioCliente = $repositoryUsuarioCliente;
        $this->repositoryUsuarioEmpresa = $repositoryUsuarioEmpresa;
        $this->repositoryPessoa = $repositoryPessoa;
    }

    public function createUsuarioCliente($request)
    {
        try {
            $dados = $this->repositoryUsuarioCliente->updateOrCreate($request, $request);

            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        }
        catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function createUsuarioEmpresa($request)
    {
        try {
            $dados = $this->repositoryUsuarioEmpresa->updateOrCreate($request, $request);

            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        }
        catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function getEmpresaUsuario()
    {
        try {
            $idUser = Auth::user()->id_usuario;
            $empresas = $this->repositoryUsuarioEmpresa->getEmpresaUsuario($idUser);

            return [
                'status' => true,
                'data' => $empresas,
                'msg' => ''
            ];

        } catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        }
    }

    public function createPessoa($arr) {
        try {
            DB::beginTransaction();

            $arr['codigo'] = $this->moduloEmpresaRepository
                ->getCodigo(1, $arr['id_empresa'])
                ->proximo_codigo;

            $queryPessoa = $this->repositoryPessoa->create($arr);

            $arr['password'] = bcrypt($arr['password']);

            $queryUsuario = $this->repository->create($arr);

            $this->repositoryUsuarioCliente->updateOrCreate([
                'id_pessoa' => $queryPessoa->id_pessoa,
                'id_usuario' => $queryUsuario->id_usuario
            ],
            [
                'id_pessoa' => $queryPessoa->id_pessoa,
                'id_usuario' => $queryUsuario->id_usuario
            ]);

            $this->moduloEmpresaRepository->updateCodigo(
                1,
                $arr['id_empresa'],
                [
                    'proximo_codigo' => $arr['codigo'] + 1
                ]
            );

            DB::commit();

            return [
                'status' => true,
                'data' => $queryUsuario,
                'msg' => ''
            ];
        }
        catch (\Exception $e) {
            DB::rollback();

            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function paginate($request)
    {
        try {
            $data = $this->repository->paginate($request);

            return [
                'status' => true,
                'data' => $data,
                'msg' => ''
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        }
    }
}
