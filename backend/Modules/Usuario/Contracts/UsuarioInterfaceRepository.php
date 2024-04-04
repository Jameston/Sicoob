<?php

namespace Modules\Usuario\Contracts;

use App\Contracts\BaseIRepository;

interface UsuarioInterfaceRepository extends BaseIRepository
{
    public function paginate($request);
}
