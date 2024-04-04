<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnQuery(array $query)
    {
        if ($query['status']) {
            return response()->json($query['data'], 200);
        }

        return response()->json($query, 400);
    }

    public function getUserId()
    {
        $user = Auth::guard('api')->user();

        return $user->id_usuario ?? null;
    }
}
