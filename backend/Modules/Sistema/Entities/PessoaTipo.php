<?php

namespace Modules\Sistema\Entities;

use App\Entities\BaseModel;

class PessoaTipo extends BaseModel
{
    protected $table = 'pessoa_tipo';

    protected $fillable = [
        'id_tipo',
        'descricao',
    ];
}
