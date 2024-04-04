<?php

namespace Modules\Usuario\Entities;

use App\Entities\BaseModel;
use Modules\Empresa\Entities\Empresa;

class UsuarioEmpresa extends BaseModel
{
    protected $table = 'empresa_usuario';

    protected $primaryKey = 'id_emp_usuario';

    protected $fillable = [
        'id_usuario',
        'id_empresa',
    ];

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id_empresa', 'id_empresa');
    }
}
