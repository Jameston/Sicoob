<?php

namespace Modules\Autenticacao\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Modules\Autenticacao\Enuns\AutenticacaoEnun;

/**
 * Class AutenticacaoInterna
 * @package namespace Modules\Autenticacao\Http\Middleware
 * @author Jameston
 */
class AutenticacaoInterna
{
    /**
     * Middleware verifica se o token gerado no login é para uso interno
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('api-revendas')->user();

        if (empty($user)) {
            $user = Auth::guard('api-clientes')->user();
        }

        if (empty($user)) {
            $user = Auth::guard('api')->user();
        }

        $dadosToken = $user->token();

        if ($dadosToken->name == AutenticacaoEnun::AUTH_INTERNO) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Access internal unauthorized.'
        ], 511);
    }
}
