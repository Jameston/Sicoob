<?php

namespace Modules\Empresa\Entities;

use App\Entities\BaseModel;
use Modules\Sistema\Entities\Cidade;

class Empresa extends BaseModel
{
    protected $table = 'empresa';

    protected $primaryKey = 'id_empresa';

    protected $fillable = [
        'nome',
        'cnpj_cpf',
        'ie_rg',
        'responsavel',
        'nome_fantasia',
        'inscricao_municipal',
        'site',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'id_cidade',
    ];

    public function cidade()
    {
        return $this->hasOne(Cidade::class, 'id_cidade', 'id_cidade');
    }
}
