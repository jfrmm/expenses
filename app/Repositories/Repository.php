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
     * Update a record in the database for the given ID
     *
     * @param array $data
     * @param int $id
     *
     * @return int
     */
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);

        return $record->update($data);
    }
}
