<?php

namespace Modules\Autenticacao\Entities;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'TB_TV_REGISTRO';

    protected $connection = 'televendas';

    protected $primaryKey = null;

    protected $fillable = [
        'SERIAL',
        'VERSAO',
        'PRODUTO',
        'DT_AQUISICAO',
        'DT_DIGITACAO',
        'DT_SUPORTE',
        'NUM_LICENCA',
        'TIP_REGISTRO',
        'ORIGINAL',
        'ULT_ACESSO',
        'ID_REVENDA',
        'ID_CLIENTE',
        'ID_FUNCIONARIO',
        'OBSERVACAO',
        'PRODUTO',
        'SAAS',
    ];

    public $timestamps = null;
}
