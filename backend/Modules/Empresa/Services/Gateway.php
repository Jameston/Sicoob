<?php

namespace Modules\Empresa\Services;

use Modules\Empresa\Entities\Empresa;
use Modules\Usuario\Entities\Usuario;
use Modules\Usuario\Entities\UsuarioEmpresa;

class Gateway
{
    public function createEmpresa($data = [])
    {
        return Empresa::create($data);
    }

    public function getEmpresaCPFCNPJ($cnpjCpf)
    {
        return Empresa::where('cnpj_cpf', $cnpjCpf)
            ->first();
    }

    public function getEmpresaById($id)
    {
        return Empresa::where('id_empresa', $id)
            ->first();
    }

    public function getUsuarioEmail($email)
    {
        return Usuario::where('usuario', $email)
            ->first();
    }

    public function updateEmpresa($id, $data = [])
    {
        return Empresa::where('id_empresa', $id)
            ->update($data);
    }

    public function createUsuario($data)
    {
        return Usuario::create($data);
    }

    public function createUsuarioEmpresa($data)
    {
        return UsuarioEmpresa::create($data);
    }
}
