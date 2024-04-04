<?php

namespace Modules\Produto\Entities;

use App\Entities\BaseModel;

class ProdutoUniMedida extends BaseModel
{
    protected $table = 'produto_uni_medida';

    protected $primaryKey = 'id_uni_medida';

    protected $fillable = [
        'unidade',
        'descricao',
        'status',
        'id_empresa',
    ];
}
