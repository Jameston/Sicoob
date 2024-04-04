<?php

namespace Modules\Usuario\Repositories;

use App\Repositories\BaseRepository;
use Modules\Usuario\Contracts\UsuarioEmpresaInterfaceRepository;
use Modules\Usuario\Entities\UsuarioEmpresa;

class UsuarioEmpresaRepository extends BaseRepository implements UsuarioEmpresaInterfaceRepository
{
    protected $modelClass = UsuarioEmpresa::class;

    public function getEmpresaUsuario($idUsuario)
    {
        $query = $this->newQuery();
        $query->where('id_usuario',$idUsuario);
        return $query->get();
    }
}
