<?php

namespace Modules\Usuario\Contracts;

use App\Contracts\BaseIRepository;

interface UsuarioEmpresaInterfaceRepository extends BaseIRepository
{
    public function getEmpresaUsuario($idUsuario);
}
