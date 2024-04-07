<?php

namespace Modules\Pessoa\Repositories;

use App\Repositories\BaseRepository;
use Modules\Pessoa\Contracts\PessoaInterfaceRepository;
use Modules\Pessoa\Entities\Pessoa;

class PessoaRepository extends BaseRepository implements PessoaInterfaceRepository
{
    protected $modelClass = Pessoa::class;

    public function getPessoaDados($idPessoa)
    {
        $query = $this->newQuery();
        $query->where('id_pessoa', $idPessoa)
            ->leftJoin('pessoa_tipo as pt', 'pt.id_pessoa_tipo', '=', 'pessoa.id_pessoa_tipo')
            ->select('pessoa.*', 'pt.descricao as tipo_cliente')
            ->with('enderecos')
            ->with('fones')
            ->with('emails');

        return $query->get()->first();
    }

    public function getByCodigo($codigo)
    {
        $query = $this->newQuery();
        $query->where('id_pessoa', $codigo)
            ->leftJoin('pessoa_tipo as pt', 'pt.id_pessoa_tipo', '=', 'pessoa.id_pessoa')
            ->select('pessoa.*', 'pt.descricao as tipo_cliente');

        return $query->get()->first();
    }

    public function paginate($request)
    {
        $query = $this->newQuery();
        $query->leftJoin('pessoa_tipo as pt', 'pt.id_pessoa_tipo', '=', 'pessoa.id_pessoa')
            ->select('pessoa.*', 'pt.descricao as tipo_cliente');
        if (isset($request['filter'])) {
            $query->where('nome', 'ilike', '%' . $request['filter'] . '%');
        }

        if (isset($request['sort'])) {
            $query = $query->orderBy('nome', 'desc');
        }

        return $query->paginate($request['per_page']);
    }

    public function getByNome($nome, $idEmpresa)
    {
        $query = $this->newQuery();
        $query->select('nome', 'cnpj_cpf', 'id_pessoa');
        $query->where('nome', 'ilike', '%' . $nome . '%');
        $query->where('id_empresa', '=', $idEmpresa);
        $query->where('status', '=', 'A');
        $query->limit(20);

        return $query->get();
    }
}
