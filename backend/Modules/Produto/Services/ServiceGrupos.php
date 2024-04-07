<?php

namespace Modules\Produto\Services;

use App\Services\ServiceBase;
use Modules\Produto\Contracts\ProdutoGrupoInterfaceRepository;

class ServiceGrupos extends ServiceBase
{
    public $repository;

    public function __construct(ProdutoGrupoInterfaceRepository $repository)
    {
        $this->repository = $repository;
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
        }
        catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }
    public function getByCodigo($codigo)
    {
        try {
            $dados = $this->repository->getByCodigo($codigo);
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
}
