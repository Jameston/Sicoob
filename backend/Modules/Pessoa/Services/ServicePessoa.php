<?php

namespace Modules\Pessoa\Services;

use App\Services\ServiceBase;
use Illuminate\Support\Facades\DB;
use Modules\Pessoa\Contracts\PessoaInterfaceRepository;

class ServicePessoa extends ServiceBase
{
    public $repository;

    public function __construct(PessoaInterfaceRepository $repository) {
        $this->repository = $repository;
    }

    public function getPessoaDados($idPessoa)
    {
        try {
            $dados = $this->repository->getPessoaDados($idPessoa);
            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function getByCodigo($codigo, $idEmpresa)
    {
        try {
            $dados = $this->repository->getByCodigo($codigo, $idEmpresa);
            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function getByNome($nome, $idEmpresa)
    {
        try {
            $dados = $this->repository->getByNome($nome, $idEmpresa);
            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        } catch (\Exception $e) {
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
            $dados = $this->repository->paginate($request);
            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function createPessoa($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['cnpj_cpf'])) {
                $data['cnpj_cpf'] = str_replace(['.', '-', '/'], ['', '', ''], $data['cnpj_cpf']);
            }

            if (isset($data['ie_rg'])) {
                $data['ie_rg'] = str_replace(['.', '-', '/'], ['', '', ''], $data['ie_rg']);
            }

            $queryPessoa = $this->repository->create($data);

            DB::commit();

            return [
                'status' => true,
                'data' => $queryPessoa,
                'msg' => ''
            ];;
        } catch (\Exception $e) {
            DB::rollback();

            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function updatePessoa($data)
    {
        try {
            DB::beginTransaction();

            $arr = $data;

            if (isset($arr['cnpj_cpf'])) {
                $arr['cnpj_cpf'] = str_replace(['.', '-', '/'], ['', '', ''], $arr['cnpj_cpf']);
            }

            if (isset($arr['ie_rg'])) {
                $arr['ie_rg'] = str_replace(['.', '-', '/'], ['', '', ''], $arr['ie_rg']);
            }

            $queryPessoa = $this->repository->update($arr['id_pessoa'], $arr);

            DB::commit();

            return [
                'status' => true,
                'data' => $queryPessoa,
                'msg' => ''
            ];;
        } catch (\Exception $e) {
            DB::rollback();

            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }
}
