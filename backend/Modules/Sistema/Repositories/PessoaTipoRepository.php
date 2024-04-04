<?php

namespace Modules\Sistema\Repositories;

use App\Repositories\BaseRepository;
use Modules\Sistema\Contracts\PessoaTipoInterfaceRepository;
use Modules\Sistema\Entities\PessoaTipo;

class PessoaTipoRepository extends BaseRepository implements PessoaTipoInterfaceRepository
{
    protected $modelClass = PessoaTipo::class;
}
