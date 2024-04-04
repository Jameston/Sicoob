<?php

namespace Modules\Autenticacao\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Clientes extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $connection = 'televendas';

    protected $table = 'V_CLIENTES';

    protected $primaryKey = 'ID_CLIENTE';

    protected $fillable = [
        'ID_CLIENTE',
        'DT_CADASTRO',
        'NOME',
        'END_CEP',
        'END_TIPO',
        'END_NUMERO',
        'END_LOGRAD',
        'END_BAIRRO',
        'END_COMPLE',
        'ID_CIDADE',
        'CIDADE',
        'UF',
        'DT_PRICOMP',
        'DT_ULTCOMP',
        'CONTATO',
        'STATUS',
        'LIMITE',
        'DDD_RESID',
        'FONE_RESID',
        'DDD_COMER',
        'FONE_COMER',
        'DDD_CELUL',
        'FONE_CELUL',
        'DDD_FAX',
        'FONE_FAX',
        'EMAIL_CONT',
        'EMAIL_NFE',
        'OBSERVACAO',
        'ID_TIPO',
        'DESCRICAO',
        'CONVENIO',
        'ADICIONAL1',
        'ADICIONAL2',
        'CNPJ',
        'NOME_FANTA',
        'INSC_ESTAD',
        'INSC_MUNIC',
        'SOC_GERENTE',
        'CPF',
        'IDENTIDADE',
        'NOME_PAI',
        'NOME_MAE',
        'PROFISSAO',
        'DT_NASCTO',
        'NATUR',
        'RENDA',
        'LOCAL_TRAB',
        'DATA_ADM',
        'NOME_CONJU',
        'NASC_CONJU',
        'CPF_CONJU',
        'NUM_DEPEN',
        'CASA_PROPR',
        'CASA_FINAN',
        'ID_PAIS',
        'NOME_PAIS',
        'VENDEDOR',
        'CPF_CNPJ',
        'RG_IE',
        'MENSAGEM',
        'PROX_CONTATO',
        'EMAIL_ADIC',
        'ID_ESTRANG',
        'INSC_SUFRAMA',
        'DT_MELHOR_VENCTO',
        'PERFIL_DE_RISCO'
    ];
}
