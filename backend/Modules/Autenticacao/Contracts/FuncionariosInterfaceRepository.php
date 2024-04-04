<?php

namespace Modules\Autenticacao\Contracts;

use App\Contracts\BaseIRepository;

interface FuncionariosInterfaceRepository extends BaseIRepository
{
    public function dadosAutenticacao($email);

    public function getByid($id);
}
