<?php

namespace Modules\Autenticacao\Repositories;

use App\Repositories\BaseRepository;
use Modules\Autenticacao\Contracts\FuncionariosInterfaceRepository;
use Modules\Autenticacao\Entities\Funcionario;

class FuncionariosRepository extends BaseRepository implements FuncionariosInterfaceRepository
{
    protected $modelClass = Funcionario::class;

    public function dadosAutenticacao($email)
    {
        $query = $this->newQuery();

        return $query->select(
            'NOME',
            'EMAIL',
            'ID_FUNCIONARIO',
            'SENHA'
        )
            ->where('EMAIL', $email)
            ->get()
            ->first();
    }

    public function getByid($id)
    {
        $query = $this->newQuery();

        return $query->select(
            'NOME',
            'EMAIL'
        )
            ->where('ID_FUNCIONARIO', $id)
            ->get()
            ->first();
    }
}
