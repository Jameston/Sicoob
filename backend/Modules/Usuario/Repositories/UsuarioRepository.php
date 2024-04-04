<?php

namespace Modules\Usuario\Repositories;

use App\Repositories\BaseRepository;
use Modules\Usuario\Contracts\UsuarioInterfaceRepository;
use Modules\Usuario\Entities\Usuario;

class UsuarioRepository extends BaseRepository implements UsuarioInterfaceRepository
{
    protected $modelClass = Usuario::class;

    public function paginate($request)
    {
        $query = $this->newQuery();
        $query->join('empresa_usuario as ep','ep.id_usuario','=','usuario.id_usuario');
        $query->select('usuario.*')
            ->where('ep.id_empresa', $request['id_empresa']);

        if (isset($request['filter'])) {
            $query->where('usuario', 'ilike', '%' . $request['filter'] . '%');
        }

        if (isset($request['sort'])) {
            $query->orderBy(explode('|', $request['sort'])[0], explode('|', $request['sort'])[1]);
        }

        return $query->paginate($request['per_page']);
    }
}
