<?php

namespace Modules\Autenticacao\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Funcionario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $connection = 'televendas';

    protected $table = 'TB_FUNCIONARIO';

    protected $primaryKey = 'ID_FUNCIONARIO';

    protected $fillable = [
        'ID_CIDADE',
        'N_REGISTRO',
        'CPF',
        'NOME',
        'RG',
        'END_CEP',
        'END_TIPO',
        'END_LOGRAD',
        'END_NUMERO',
        'END_COMPLE',
        'END_BAIRRO',
        'DDD',
        'FONE',
        'CELULAR',
        'EMAIL',
        'SALARIO',
        'EXTRA',
        'DATA_NASCT',
        'DATA_ADMIS',
        'DATA_DEMIS',
        'RAMAL',
        'SENHA',
        'IP',
        'STATUS',
        'ID_SETOR',
        'ID_CARGO',
        'FOTO',
        'PIS',
        'APELIDO',
        'OBSERVACAO',
        'SPC_USUARIO',
        'SPC_SENHA',
        'LOGIN_CENTRAL'
    ];
}
