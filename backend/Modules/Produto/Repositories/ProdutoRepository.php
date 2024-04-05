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
        $query->leftJoin('produto_grupo as pg', 'pg.id_produto_grupo', '=', 'produto.id_grupo')
        ->leftJoin('produto_uni_medida as pm', 'pm.id_uni_medida', '=', 'produto.id_uni_medida')
            ->select('produto.*', 'pg.descricao as grupo', 'pm.descricao as medida');

        if (isset($request['columnFilters'])) {
            foreach ($request['columnFilters'] as $key => $c) {
                $query->where($key, 'ilike', '%' . $c . '%');
            }
        }

        /* if (isset($request['sort'])) {
            foreach ($request['sort'] as $key => $s) {
                if (is_null($s)) {
                    $query = $query->orderBy('id_produto', 'desc');
                    break;
                }
                $query = $query->orderBy($s['field'], $s['type']);
            }
        }*/

        return $query->paginate($request['per_page']);
    }
}
