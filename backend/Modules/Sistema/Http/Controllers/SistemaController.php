<?php

namespace Modules\Sistema\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Sistema\Services\ServiceSistema;
use Modules\Sistema\Http\Requests\FiltroRequest;

class SistemaController extends Controller
{
    protected $service;

    public function __construct(ServiceSistema $service
    ) {
        $this->service = $service;
    }

    public function cidade(FiltroRequest $request)
    {
        $query = $this->service->getCidade($request->get('filtro'));

        return $this->returnQuery($query);
    }

    public function getPessoaTipo()
    {
        $query = $this->service->getPessoaTipo();

        return $this->returnQuery($query);
    }
}
