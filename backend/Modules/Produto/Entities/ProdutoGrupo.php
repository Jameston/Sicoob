<?php

namespace Modules\Produto\Entities;

use App\Entities\BaseModel;

class ProdutoGrupo extends BaseModel
{
    protected $table = 'produto_grupo';

    protected $primaryKey = 'id_produto_grupo';

    protected $fillable = [
        'descricao',
        'status',
        'id_empresa',
    ];
}
