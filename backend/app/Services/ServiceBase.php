<?php

namespace App\Services;

use App\Repositories\BaseRepository;

/**
 * Class ServiceBase
 * @package App\Services
 */
abstract class ServiceBase
{
    public $repository = BaseRepository::class;

    /**
     * @return array
     */
    public function all(): array
    {
        try
        {
            $query = $this->repository->all();
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        return [
            'status' => true,
            'msg' => '',
            'data' => $query
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        try
        {
            $query = $this->repository->find($id);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        if (!$query) {
            return [
                'status' => false,
                'msg' => 'Registro não encontrado!'
            ];
        }

        return [
            'status' => true,
            'msg' => '',
            'data' => $query
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        try
        {
            $query = $this->repository->create($data);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }
        return [
            'status' => true,
            'msg' => 'Cadastrado com sucesso!',
            'data' => $query
        ];
    }

    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): array
    {
        $register = $this->find($id);

        if (!$register['status']) {
            return $register;
        }

        try
        {
            $query = $this->repository->update($id, $data);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        return [
            'status' => true,
            'msg' => 'Atualizado com sucesso!',
            'data' => $query
        ];
    }

    /**
     * @param array $data
     * @param array $newData
     * @return array
     */
    public function updateOrCreate(array $data, array $newData): array
    {
        try
        {
            $query = $this->repository->updateOrCreate($data, $newData);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        return [
            'status' => true,
            'msg' => 'Criado/Atualizado com sucesso!',
            'data' => $query
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $register = $this->find($id);

        if (!$register['status']) {
            return $register;
        }

        try
        {
            $this->repository->delete($id);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        return [
            'status' => true,
            'msg' => 'Excluído com sucesso',
            'data' => ''
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function forceDelete(int $id): array
    {
        $register = $this->find($id);

        if (!$register['status']) {
            return $register;
        }

        try
        {
            $this->repository->forceDelete($id);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        return [
            'status' => true,
            'msg' => 'Excluído com sucesso',
            'data' => ''
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function findByIdEmitente(int $id): array
    {
        try
        {
            $query = $this->repository->findByIdEmitente($id);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        if (!$query || count($query) == 0) {
            return [
                'status' => false,
                'msg' => 'Registro não encontrado!'
            ];
        }

        return [
            'status' => true,
            'msg' => '',
            'data' => $query
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function findByIdIdEmitente(int $id, int $id_emitente): array
    {
        try
        {
            $query = $this->repository->findByIdIdEmitente($id, $id_emitente);
        }
        catch (\Exception $e)
        {
            return [
                'status' => false,
                'msg' => $e->getMessage()
            ];
        }

        if (!$query) {
            return [
                'status' => false,
                'msg' => 'Registro não encontrado!'
            ];
        }

        return [
            'status' => true,
            'msg' => '',
            'data' => $query
        ];
    }
}
