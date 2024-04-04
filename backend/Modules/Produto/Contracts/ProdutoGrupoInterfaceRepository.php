<?php

namespace Modules\Produto\Contracts;

use App\Contracts\BaseIRepository;

interface ProdutoGrupoInterfaceRepository extends BaseIRepository
{
    public function paginate($request);
}
