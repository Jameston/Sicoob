<?php

namespace Modules\Produto\Contracts;

use App\Contracts\BaseIRepository;

interface ProdutoUniMedidaInterfaceRepository extends BaseIRepository
{
    public function paginate($request);
}
