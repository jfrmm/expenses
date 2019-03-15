<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Based of
 * https://crnkovic.me/proper-repository-pattern-implementation-in-laravel/
 */
class Repository
{
    /**
     * The model
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create a record in the database
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a record in the database
     *
     * @param array $data
     * @param int $id
     *
     * @return bool
     */
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);

        return $record->update($data);
    }

    /**
     * Delete a record in the database
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $record = $this->model->find($id);

        return $record->delete();
    }
}
