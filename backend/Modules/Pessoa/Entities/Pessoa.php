<?php

namespace Modules\Pessoa\Entities;

use App\Entities\BaseModel;
use Modules\Sistema\Entities\Cidade;
use Modules\Sistema\Entities\PessoaTipo;

class Pessoa extends BaseModel
{
    protected $table = 'pessoa';

    protected $primaryKey = 'id_pessoa';

    protected $fillable = [
        'nome',
        'responsavel',
        'status',
        'observacao',
        'cnpj_cpf',
        'ie_rg',
        'nome_fantasia',
        'id_empresa',
        'id_pessoa_tipo',
        'telefone',
        'cep',
        'id_cidade',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'email'
    ];

    public function pessoaTipo()
    {
        return $this->hasOne(PessoaTipo::class, 'id_pessoa_tipo', 'id_pessoa_tipo');
    }

    public function cidade()
    {
        return $this->hasOne(Cidade::class, 'id_cidade', 'id_cidade');
    }
}
