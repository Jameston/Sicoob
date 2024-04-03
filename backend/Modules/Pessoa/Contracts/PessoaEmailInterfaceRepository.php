<?php

namespace Modules\Pessoa\Contracts;

use App\Contracts\BaseIRepository;

/**
 * Interface PessoaEmailInterfaceRepository
 * @package Modules\Pessoa\Contracts
 */
interface PessoaEmailInterfaceRepository extends BaseIRepository
{
    public function deleteByIdPessoa($idPessoa);
}
