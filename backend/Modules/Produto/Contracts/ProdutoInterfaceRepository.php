<?php

namespace Modules\Produto\Contracts;

use App\Contracts\BaseIRepository;

interface ProdutoInterfaceRepository extends BaseIRepository
{
    public function getByCodigo($request);
}
