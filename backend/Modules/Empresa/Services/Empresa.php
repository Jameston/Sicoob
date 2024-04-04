<?php

namespace Modules\Empresa\Services;

class Empresa
{
    public $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function create($data)
    {
        try {
            $empresa = $this->gateway->getEmpresaCPFCNPJ($data['cnpj_cpf']);

            if (!empty($empresa)) {
                return [
                    'status' => false,
                    'msg' => 'CNPJ/CPF já cadastrado!'
                ];
            }

            $usuario = $this->gateway->getUsuarioEmail($data['email']);

            if (!empty($usuario)) {
                return [
                    'status' => false,
                    'msg' => 'E-mail já cadastrado!'
                ];
            }

            $empresa = $this->gateway->createEmpresa([
                'nome' => $data['nome'],
                'responsavel' => $data['nome'],
                'email' => $data['email'],
                'cnpj_cpf' => $data['cnpj_cpf'],
            ]);

            $usuario = $this->gateway->createUsuario([
                'usuario' => $data['email'],
                'password' => bcrypt($data['password']),
                'nome' => $data['nome'],
            ]);

            $usuarioEmpresa = $this->gateway->createUsuarioEmpresa([
                'id_usuario' => $usuario->id_usuario,
                'id_empresa' => $empresa->id_empresa,
            ]);

            return [
                'status' => true,
                'msg' => 'Cadastro realizado com sucesso!',
                'data' => [
                    'msg' => 'Cadastro realizado com sucesso!',
                ]
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'msg' => 'Erro ao salvar'
            ];
        }
    }

    public function update($id, $data)
    {
        try {
            $this->gateway->updateEmpresa($id, $data);

            return [
                'status' => true,
                'msg' => 'Cadastro atualizado com sucesso!',
                'data' => [
                    'msg' => 'Cadastro atualizado com sucesso!',
                ]
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'msg' => 'Erro ao salvar'
            ];
        }
    }

    public function find($id)
    {
        try {
            $empresa = $this->gateway->getEmpresaById($id);

            return [
                'status' => true,
                'msg' => 'Cadastro atualizado com sucesso!',
                'data' => $empresa
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'msg' => 'Erro ao consultar'
            ];
        }
    }
}
