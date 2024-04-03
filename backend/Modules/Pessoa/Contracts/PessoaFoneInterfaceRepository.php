<?php

namespace Modules\Pessoa\Contracts;

use App\Contracts\BaseIRepository;

/**
 * Interface PessoaFoneInterfaceRepository
 * @package Modules\Pessoa\Contracts
 */
interface PessoaFoneInterfaceRepository extends BaseIRepository
{
    public function deleteByIdPessoa($idPessoa);
}
