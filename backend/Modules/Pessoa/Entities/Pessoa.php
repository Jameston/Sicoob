<?php

namespace Modules\Pessoa\Entities;

use App\Entities\BaseModel;

class Pessoa extends BaseModel
{
    protected $table = 'pessoa';

    protected $primaryKey = 'id_pessoa';

    protected $fillable = [
        'nome',
        'email',
        'fone',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'id_cidade',
        'id_tipo',
        'cnpj_cpf',
        'ie_rg',
        'status'
    ];
}
