<?php

namespace Modules\Produto\Entities;

use App\Entities\BaseModel;

class Produto extends BaseModel
{
    protected $table = 'produto';

    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'descricao',
        'status',
        'observacao',
        'codigo_barras',
        'quantidade',
        'preco',
        'custo',
        'id_empresa',
        'id_uni_medida',
        'id_produto_grupo',
    ];

    public function cidade()
    {
        return $this->hasOne(ProdutoGrupo::class, 'id_produto_grupo', 'id_produto_grupo');
    }

    public function unidadeMedida()
    {
        return $this->hasOne(ProdutoUniMedida::class, 'id_uni_medida', 'id_uni_medida');
    }
}
