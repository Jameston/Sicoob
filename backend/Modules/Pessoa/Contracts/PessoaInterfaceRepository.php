<?php

namespace Modules\Pessoa\Contracts;

use App\Contracts\BaseIRepository;

/**
 * Interface PessoaInterfaceRepository
 * @package Modules\Pessoa\Contracts
 */
interface PessoaInterfaceRepository extends BaseIRepository
{
    public function getPessoaDados($idPessoa);

    public function paginate($request);

    public function getByNome($nome, $idEmpresa);
}
