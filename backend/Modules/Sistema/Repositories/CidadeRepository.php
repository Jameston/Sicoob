<?php

namespace Modules\Sistema\Repositories;

use App\Repositories\BaseRepository;
use Modules\Sistema\Contracts\CidadeInterfaceRepository;
use Modules\Sistema\Entities\Cidade;

class CidadeRepository extends BaseRepository implements CidadeInterfaceRepository
{
    protected $modelClass = Cidade::class;

    public function getFilter($filtro)
    {
        $query = $this->newQuery();
        $query->select('*');

        $query->where('cidade', 'ilike', '%' . $filtro . '%');
        $query->orWhere('uf', 'ilike', '%' . $filtro . '%');

        return $query->get();
    }
}
