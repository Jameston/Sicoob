<?php

namespace Modules\Usuario\Repositories;

use App\Repositories\BaseRepository;
use Modules\Usuario\Contracts\UsuarioClienteInterfaceRepository;
use Modules\Usuario\Entities\UsuarioCliente;

class UsuarioClienteRepository extends BaseRepository implements UsuarioClienteInterfaceRepository
{
    protected $modelClass = UsuarioCliente::class;
}
