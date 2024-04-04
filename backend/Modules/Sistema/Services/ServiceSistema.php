<?php

namespace Modules\Sistema\Services;

use App\Services\ServiceBase;
use Modules\Sistema\Contracts\CidadeInterfaceRepository;
use Modules\Sistema\Contracts\PessoaTipoInterfaceRepository;

/**
 * Class ServiceSistema
 * @package Modules\Sistema\Services
 */
class ServiceSistema extends ServiceBase
{
    public $cidadeRepository;

    public $pessoaTipoInterfaceRepository;

    public function __construct(
        CidadeInterfaceRepository $cidadeRepository,
        PessoaTipoInterfaceRepository $pessoaTipoInterfaceRepository
    )
    {
        $this->cidadeRepository = $cidadeRepository;
        $this->pessoaTipoInterfaceRepository = $pessoaTipoInterfaceRepository;
    }

    public function getPessoaTipo()
    {
        try {
            $dados = $this->pessoaTipoInterfaceRepository->all();

            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        }
        catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

    public function getCidade($filtro)
    {
        try {
            $dados = $this->cidadeRepository->getFilter($filtro);

            return [
                'status' => true,
                'data' => $dados,
                'msg' => ''
            ];
        }
        catch (\Exception $e) {
            return [
                'status' => false,
                'data' => [],
                'msg' => $e->getMessage()
            ];
        };
    }

}
