<?php

namespace Modules\Autenticacao\Contracts;

use App\Contracts\BaseIRepository;

interface RevendasInterfaceRepository extends BaseIRepository
{
    public function dadosAutenticacao($cnpj);

    public function getByid($id);
}
