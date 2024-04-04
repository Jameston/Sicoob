<?php

namespace App\Contracts;

/**
 * Interface BaseIRepository
 * @package App\Contracts
 */
interface BaseIRepository
{
    public function all();
    public function find(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function updateOrCreate(array $data, array $newData);
    public function delete(int $id);
    public function forceDelete(int $id);
    public function findByIdEmitente(int $id);
    public function findByIdIdEmitente(int $id, int $id_emitente);
}
