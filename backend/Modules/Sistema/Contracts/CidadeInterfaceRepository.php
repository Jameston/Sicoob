<?php

namespace Modules\Sistema\Contracts;

use App\Contracts\BaseIRepository;

interface CidadeInterfaceRepository extends BaseIRepository
{
    public function getFilter($filtro);
}
