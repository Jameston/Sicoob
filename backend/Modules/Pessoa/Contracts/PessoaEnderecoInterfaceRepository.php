<?php

namespace Modules\Pessoa\Contracts;

use App\Contracts\BaseIRepository;

/**
 * Interface PessoaEnderecoInterfaceRepository
 * @package Modules\Pessoa\Contracts
 */
interface PessoaEnderecoInterfaceRepository extends BaseIRepository
{
    public function deleteByIdPessoa($idPessoa);
}
