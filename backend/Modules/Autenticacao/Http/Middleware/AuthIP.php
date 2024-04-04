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
class AuthIP
{
    const IPS_AUTORIZADOS = ['27.0.01'];
    /**
     * Middleware verifica se o token gerado no login é para uso interno
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dd($_SERVER);

        if (in_array($_SERVER['ip'], self::IPS_AUTORIZADOS)) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Access internal unauthorized.'
        ], 511);
    }
}
