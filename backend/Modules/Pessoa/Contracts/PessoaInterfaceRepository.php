<?php

namespace Modules\Pessoa\Contracts;

use App\Contracts\BaseIRepository;

interface PessoaInterfaceRepository extends BaseIRepository
{
    public function getPessoaDados($idPessoa);

    public function getByCodigo($codigo);

    public function paginate($request);

    public function getByNome($nome, $idEmpresa);
}
