<?php

namespace Modules\Produto\Services;

use App\Services\ServiceBase;
use Illuminate\Support\Facades\DB;
use Modules\Produto\Contracts\ProdutoInterfaceRepository;
use Modules\Produto\Contracts\ProdutoGrupoInterfaceRepository;
use Modules\Produto\Contracts\ProdutoUniMedidaInterfaceRepository;

class ServiceProduto extends ServiceBase
{
    public $repository;

    public $repositoryGrupo;

    public $repositoryUniMedida;

    public function __construct(
        ProdutoInterfaceRepository $repository,
        ProdutoGrupoInterfaceRepository $repositoryGrupo,
        ProdutoUniMedidaInterfaceRepository $repositoryUniMedida
    )
    {
        $this->repository = $repository;
        $this->repositoryGrupo = $repositoryGrupo;
        $this->repositoryUniMedida = $repositoryUniMedida;
    }

    public function createProduto($data)
    {
        try {
            DB::beginTransaction();

            $queryProduto = $this->repository->create($data);

            DB::commit();

            return [
                'status' => true,
                'data' => $queryProduto,
                'msg' => ''
            ];;
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

    public function updateProduto($data)
    {
        try {
            DB::beginTransaction();

            $arr = $data;

            $queryProduto = $this->update($arr['id_produto'], $arr);

            DB::commit();

            return [
                'status' => true,
                'data' => $queryProduto,
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
}
