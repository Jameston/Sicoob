<?php

namespace Modules\Autenticacao\Repositories;

use App\Repositories\BaseRepository;
use Modules\Autenticacao\Contracts\ClientesInterfaceRepository;
use Modules\Autenticacao\Entities\Clientes;

class ClientesRepository extends BaseRepository implements ClientesInterfaceRepository
{
    protected $modelClass = Clientes::class;

    public function getByid($id)
    {
        $query = $this->newQuery();

        return $query->select(
            'V_CLIENTES.NOME',
            'V_CLIENTES.ID_CLIENTE',
            'V_CLIENTES.CPF_CNPJ',
            'V_CLIENTES.EMAIL_CONT AS EMAIL'
        )
            ->where('ID_CLIENTE', $id)
            ->get()
            ->first();
    }
}
