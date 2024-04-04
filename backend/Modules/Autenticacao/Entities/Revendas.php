<?php

namespace Modules\Autenticacao\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Revendas extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $connection = 'televendas';

    protected $table = 'TB_EC_USUARIO';

    protected $primaryKey = 'ID_CLIENTE';

    protected $fillable = [
        'ID_CLIENTE',
        'CNPJ',
        'SENHA',
        'CREATED_AT',
        'UPDATED_AT',
        'IP',
        'SOLICITAR_SENHA',
    ];
}
