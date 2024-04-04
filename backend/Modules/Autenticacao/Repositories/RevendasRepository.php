<?php

namespace Modules\Autenticacao\Repositories;

use App\Repositories\BaseRepository;
use Modules\Autenticacao\Contracts\RevendasInterfaceRepository;
use Modules\Autenticacao\Entities\Revendas;

class RevendasRepository extends BaseRepository implements RevendasInterfaceRepository
{
    protected $modelClass = Revendas::class;

    public function dadosAutenticacao($cnpj)
    {
        $query = $this->newQuery();

        return $query->select(
            'TB_CLIENTE.NOME',
            'TB_CLIENTE.EMAIL_CONT as EMAIL',
            // 'TB_CLIENTE.CPF_CNPJ as CPF_CNPJ',
            'TB_EC_USUARIO.SENHA',
            'TB_EC_USUARIO.ID_CLIENTE'
        )
            ->join('TB_CLIENTE', 'TB_CLIENTE.ID_CLIENTE', '=', 'TB_EC_USUARIO.ID_CLIENTE')
            // ->join('TB_CLI_PJ', 'TB_CLI_PJ.ID_CLIENTE', '=', 'TB_CLIENTE.ID_CLIENTE')
            ->where('TB_EC_USUARIO.CNPJ', $cnpj)
            ->where('TB_CLIENTE.STATUS', 'A')
            ->get()
            ->first();
    }

    public function getByid($id)
    {
        $query = $this->newQuery();

        return $query->select(
            'V_CLIENTES.NOME',
            'V_CLIENTES.EMAIL_CONT AS EMAIL',
            'V_CLIENTES.CPF_CNPJ AS CPF_CNPJ',
            'ttrf.DESCRICAO as FAIXA'
        )
            ->join('V_CLIENTES', 'V_CLIENTES.ID_CLIENTE', '=', 'TB_EC_USUARIO.ID_CLIENTE')
            ->join('TB_TV_RANKING_REVENDA as ttrr', 'ttrr.ID_REVENDA', '=', 'V_CLIENTES.ID_CLIENTE')
            ->join('TB_TV_RANKING_FAIXA as ttrf','ttrr.ID_FAIXA','=','ttrf.ID_FAIXA')
            ->where('TB_EC_USUARIO.ID_CLIENTE', $id)
            ->get()
            ->first();
    }
}
