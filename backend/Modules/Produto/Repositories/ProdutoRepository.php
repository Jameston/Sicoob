<?php

namespace Modules\Produto\Repositories;

use App\Repositories\BaseRepository;
use Modules\Produto\Contracts\ProdutoInterfaceRepository;
use Modules\Produto\Entities\Produto;

class ProdutoRepository extends BaseRepository implements ProdutoInterfaceRepository
{
    protected $modelClass = Produto::class;

    public function paginate($request)
    {
        $query = $this->newQuery();
        $query->leftJoin('produto_grupo as pg', 'pg.id_produto_grupo', '=', 'produto.id_produto_grupo')
        ->leftJoin('produto_uni_medida as pm', 'pm.id_uni_medida', '=', 'produto.id_uni_medida')
            ->select('produto.*', 'pg.descricao as grupo', 'pm.descricao as medida');

        if (isset($request['filter'])) {
            $query->where('produto.descricao', 'ilike', '%' . $request['filter'] . '%');
        }

        if (isset($request['sort'])) {
            $query = $query->orderBy('produto.descricao', 'asc');
        }

        return $query->paginate($request['per_page']);
    }

    public function getByCodigo($codigo)
    {
        $query = $this->newQuery();
        $query->where('id_produto', $codigo)
            ->select('produto.*');

        return $query->get()->first();
    }
}
