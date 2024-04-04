<?php

namespace Modules\Usuario\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $table = 'usuario';

    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'usuario',
        'password',
        'remember_token',
        'nome',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function usuarioEmpresa()
    {
        return $this->hasOne(UsuarioEmpresa::class, 'id_usuario')->select('id_empresa');
    }

    public function usuarioPessoa()
    {
        return $this->hasOne(UsuarioCliente::class, 'id_usuario')->select('id_pessoa');
    }
}
