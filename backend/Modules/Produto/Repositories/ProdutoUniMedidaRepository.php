<?php

namespace Modules\Produto\Repositories;

use App\Repositories\BaseRepository;
use Modules\Produto\Contracts\ProdutoUniMedidaInterfaceRepository;
use Modules\Produto\Entities\ProdutoUniMedida;

class ProdutoUniMedidaRepository extends BaseRepository implements ProdutoUniMedidaInterfaceRepository
{
    protected $modelClass = ProdutoUniMedida::class;

    public function paginate($request)
    {
        $query = $this->newQuery();
        $query->where('id_empresa', $request['id_empresa']);

        if (isset($request['filter'])) {
            $query->where('descricao', 'ilike', '%' . $request['filter'] . '%');
        }

        if (isset($request['sort'])) {
            $query->orderBy(explode('|', $request['sort'])[0], explode('|', $request['sort'])[1]);
        }

        return $query->paginate($request['per_page']);
    }
}
