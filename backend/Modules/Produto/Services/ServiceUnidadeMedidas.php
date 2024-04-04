<?php

namespace Modules\Produto\Services;

use App\Services\ServiceBase;
use Modules\Produto\Contracts\ProdutoUniMedidaInterfaceRepository;

class ServiceUnidadeMedidas extends ServiceBase
{
    public $repository;

    public function __construct(ProdutoUniMedidaInterfaceRepository $repository)
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
}
