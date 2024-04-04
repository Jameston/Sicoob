<?php

namespace Modules\Usuario\Entities;

use App\Entities\BaseModel;
use Modules\Pessoa\Entities\Pessoa;

class UsuarioCliente extends BaseModel
{
    protected $table = 'pessoa_usuario';

    public $incrementing = false;

    protected $fillable = [
        'id_pessoa',
        'id_usuario',
    ];

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, 'id_pessoa', 'id_pessoa');
    }
}
