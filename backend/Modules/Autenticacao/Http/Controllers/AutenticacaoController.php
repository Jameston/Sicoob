<?php

namespace Modules\Autenticacao\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Autenticacao\Http\Requests\AuthRequest;
use Modules\Autenticacao\Services\Autenticacao;

class AutenticacaoController extends Controller
{
    protected $service;

    public function __construct(Autenticacao $service)
    {
        $this->service = $service;
    }

    public function index(AuthRequest $request)
    {
        $autenticacao = $this->service->login($request->all());

        return $this->returnQuery($autenticacao);
    }

    public function dados()
    {
        $query = $this->service->dados();

        return $this->returnQuery($query);
    }

    public function logout()
    {
        $query = $this->service->logout();

        return $this->returnQuery($query);
    }
}
