<?php

namespace Modules\Autenticacao\Services;

use Illuminate\Support\Facades\Auth;

class Autenticacao
{
    public function dados()
    {
        $user = Auth::guard('api')->user();

        return [
            'status' => true,
            'data' => $user,
            'msg' => ''
        ];
    }

    public function login($request)
    {
        try {
            if (Auth::attempt([
                'usuario' => $request['email'],
                'password' => $request['password']
            ])) {
                $user = Auth::user();
                $user['token'] = $user->createToken('Laravel Password Grant Client')->accessToken;
                $user['msg'] = 'Logado com sucesso!';

                return [
                    'status' => true,
                    'data' => $user,
                    'msg' => ''
                ];
            }

            return [
                'status' => false,
                'msg' => 'Login ou senha inválidos'
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'msg' => 'Login ou senha inválidos'
            ];
        };
    }

    public function logout()
    {
        try {
            $user = Auth::guard('api')->user();

            $user->token()->revoke();

            return [
                'status' => true,
                'data' => [],
                'msg' => 'Deslogado com sucesso!'
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => 'Ocorreu um erro'
            ];
        };
    }
}
