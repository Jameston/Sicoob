<?php

namespace Modules\Pessoa\Repositories;

use App\Repositories\BaseRepository;
use Modules\Pessoa\Contracts\PessoaInterfaceRepository;
use Modules\Pessoa\Entities\Pessoa;

/**
 * Class PessoaRepository
 * @package Modules\Pessoa\Repositories
 */
class PessoaRepository extends BaseRepository implements PessoaInterfaceRepository
{
    protected $modelClass = Pessoa::class;

    public function getPessoaDados($idPessoa)
    {
        $query = $this->newQuery();
        $query->where('id_pessoa', $idPessoa)
            ->leftJoin('pessoa_tipo as pt', 'pt.id_tipo', '=', 'pessoa.id_pessoa_tipo')
            ->select('pessoa.*', 'pt.descricao as tipo_cliente');

        return $query->get()->first();
    }

    public function paginate($request)
    {
        $query = $this->newQuery();
        $query->leftJoin('pessoa_tipo as pt', 'pt.id_tipo', '=', 'pessoa.id_pessoa_tipo')
            ->select('pessoa.*', 'pt.descricao as tipo_cliente');

        if (isset($request['columnFilters'])) {
            foreach ($request['columnFilters'] as $key => $c) {
                $query->where($key, 'ilike', '%' . $c . '%');
            }
        }

        if (isset($request['sort'])) {
            foreach ($request['sort'] as $key => $s) {
                if (is_null($s)) {
                    $query = $query->orderBy('id_pessoa', 'desc');
                    break;
                }
                $query = $query->orderBy($s['field'], $s['type']);
            }
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
