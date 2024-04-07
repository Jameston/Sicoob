<?php

namespace Modules\Produto\Repositories;

use App\Repositories\BaseRepository;
use Modules\Produto\Contracts\ProdutoGrupoInterfaceRepository;
use Modules\Produto\Entities\ProdutoGrupo;

class ProdutoGrupoRepository extends BaseRepository implements ProdutoGrupoInterfaceRepository
{
    protected $modelClass = ProdutoGrupo::class;

    public function paginate($request)
    {
        $query = $this->newQuery();

        if (isset($request['filter'])) {
            $query->where('descricao', 'ilike', '%' . $request['filter'] . '%');
        }

        if (isset($request['sort'])) {
            $query->orderBy(explode('|', $request['sort'])[0], explode('|', $request['sort'])[1]);
        }

        return $query->paginate($request['per_page']);
    }

    public function getByCodigo($codigo)
    {
        $query = $this->newQuery();
        $query->where('id_produto_grupo', $codigo)
            ->select('produto_grupo.*');

        return $query->get()->first();
    }
}
