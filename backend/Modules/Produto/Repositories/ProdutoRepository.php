<?php

namespace Modules\Produto\Repositories;

use App\Repositories\BaseRepository;
use Modules\Produto\Contracts\ProdutoInterfaceRepository;
use Modules\Produto\Entities\Produto;

class ProdutoRepository extends BaseRepository implements ProdutoInterfaceRepository
{
    protected $modelClass = Produto::class;
}
