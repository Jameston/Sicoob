<?php

namespace App\Repositories;

use App\Contracts\BaseIRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository implements BaseIRepository
{
    protected $modelClass;

    /**
     * @return mixed
     */
    protected function newQuery()
    {
        return app($this->modelClass)->newQuery();
    }

    /**
     * @return string
     */
    protected function table() :string
    {
        return app($this->modelClass)->getTable();
    }

    /**
     * @return string
     */
    protected function primaryKey() :string
    {
        return app($this->modelClass)->getKeyName();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->newQuery()->get();
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function find(int $id)
    {
        return $this->newQuery()->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->newQuery()->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        return $this->newQuery()->find($id)->update($data);
    }

    /**
     * @param array $data
     * @param array $newData
     * @return mixed
     */
    public function updateOrCreate(array $data, array $newData)
    {
        return $this->newQuery()->updateOrCreate($data, $newData);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->newQuery()->where($this->primaryKey(), $id)->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function forceDelete(int $id)
    {
        return $this->newQuery()->where($this->primaryKey(), $id)->forceDelete();
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function findByIdEmitente(int $id)
    {
        return $this->newQuery()->where('id_emitente', $id)->get();
    }

    /**
     * @param int $id
     * @param int $id_emitente
     * @return Collection
     */
    public function findByIdIdEmitente(int $id, int $id_emitente)
    {
        return $this->newQuery()->where('id', $id)->where('id_emitente', $id_emitente)->get()->first();
    }
}
