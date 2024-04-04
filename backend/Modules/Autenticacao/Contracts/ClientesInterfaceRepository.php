<?php

namespace Modules\Autenticacao\Contracts;

use App\Contracts\BaseIRepository;

interface ClientesInterfaceRepository extends BaseIRepository
{
    public function getByid($id);
}
