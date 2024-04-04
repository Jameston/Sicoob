<?php

namespace Modules\Empresa\Repositories;

use Modules\Empresa\Entities\Empresa;
use Modules\Empresa\Contracts\EmpresaInterfaceRepository;
use App\Repositories\BaseRepository;

/**
 * Class EmpresaRepository
 * @package Modules\Empresa\Repositories
 */
class EmpresaRepository extends BaseRepository implements EmpresaInterfaceRepository
{
    protected $modelClass = Empresa::class;
}
