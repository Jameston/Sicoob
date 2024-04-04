<?php

namespace Modules\Autenticacao\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class CheckAutenticacao
 * @package namespace Modules\Autenticacao\Http\Middleware
 * @author Jameston
 */
class CheckAutenticacao
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

        if (empty($user)) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], 401);
        }

        return $next($request);
    }
}
