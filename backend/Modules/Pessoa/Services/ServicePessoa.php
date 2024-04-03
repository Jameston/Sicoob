<?php

namespace Modules\Pessoa\Services;

use App\Services\ServiceBase;
use Illuminate\Support\Facades\DB;
use Modules\Pessoa\Contracts\PessoaEmailInterfaceRepository;
use Modules\Pessoa\Contracts\PessoaEnderecoInterfaceRepository;
use Modules\Pessoa\Contracts\PessoaFoneInterfaceRepository;
use Modules\Pessoa\Contracts\PessoaInterfaceRepository;
use Modules\Sistema\Contracts\ModuloEmpresaInterfaceRepository;

/**
 * Class SerivcePessoa
 * @package Modules\Pessoa\Services
 */
class ServicePessoa extends ServiceBase
{
    public $repository;

    public $repositoryEndereco;

    public $repositoryEmail;

    public $repositoryFone;

    public $repositoryModuloEmpresa;

    public function __construct(
        PessoaInterfaceRepository $repository,
        PessoaEmailInterfaceRepository $repositoryEmail,
        PessoaFoneInterfaceRepository $repositoryFone,
        PessoaEnderecoInterfaceRepository $repositoryEndereco,
        ModuloEmpresaInterfaceRepository $repositoryModuloEmpresa
    ) {
        $this->repository = $repository;
        $this->repositoryEmail = $repositoryEmail;
        $this->repositoryFone = $repositoryFone;
        $this->repositoryEndereco = $repositoryEndereco;
        $this->repositoryModuloEmpresa = $repositoryModuloEmpresa;
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

            $modulo = $this->repositoryModuloEmpresa->getCodigo(1, $data['id_empresa']);

            $data['codigo'] = $modulo->proximo_codigo;

            $queryPessoa = $this->repository->create($data);

            $this->createEnderecos($data, $queryPessoa->id_pessoa);

            $this->createEmails($data, $queryPessoa->id_pessoa);

            $this->createFones($data, $queryPessoa->id_pessoa);

            DB::commit();

            $this->repositoryModuloEmpresa->update($modulo->id_modulo_empresa, [
                'proximo_codigo' => $modulo->proximo_codigo + 1
            ]);

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

    public function createEnderecos($data, $idPessoa)
    {
        if (isset($data['enderecos'])) {
            $enderecos = [];

            foreach ($data['enderecos'] as $endereco) {
                $arrayEndereco = (array) $endereco;
                $arrayEndereco['id_pessoa'] = $idPessoa;
                $enderecos[] = $this->repositoryEndereco->create($arrayEndereco);
            }

            return $enderecos;
        }

        return [];
    }

    public function createEmails($data, $idPessoa)
    {
        if (isset($data['emails'])) {
            $emails = [];

            foreach ($data['emails'] as $email) {
                $arrayemail = (array) $email;
                $arrayemail['id_pessoa'] = $idPessoa;
                $emails[] = $this->repositoryEmail->create($arrayemail);
            }

            return $emails;
        }

        return [];
    }

    public function createFones($data, $idPessoa)
    {
        if (isset($data['fones'])) {
            $fones = [];

            foreach ($data['fones'] as $fone) {
                $arrayfone = (array) $fone;
                $arrayfone['id_pessoa'] = $idPessoa;
                $fones[] = $this->repositoryFone->create($arrayfone);
            }

            return $fones;
        }

        return [];
    }

    public function deleteEnderecos($idPessoa)
    {
        $query = $this->repositoryEndereco->deleteByIdPessoa($idPessoa);

        return $query;
    }

    public function deleteEmails($idPessoa)
    {
        $query = $this->repositoryEmail->deleteByIdPessoa($idPessoa);

        return $query;
    }

    public function deleteFones($idPessoa)
    {
        $query = $this->repositoryFone->deleteByIdPessoa($idPessoa);

        return $query;
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

            $this->deleteEnderecos($arr['id_pessoa']);

            $this->deleteEmails($arr['id_pessoa']);

            $this->deleteFones($arr['id_pessoa']);

            $this->createEnderecos($data, $arr['id_pessoa']);

            $this->createEmails($data, $arr['id_pessoa']);

            $this->createFones($data, $arr['id_pessoa']);

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
