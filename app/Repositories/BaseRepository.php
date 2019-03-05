<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BaseRepository implements BaseRepositoryInterface
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
     * Get all instances of the model
     *
     * @return Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Create a new record in the database
     *
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Show a record for the given ID
     *
     * @param int $id
     *
     * @return Model
     */
    public function show($id)
    {
        return $this->model-findOrFail($id);
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
        $record = $this->find($id);

        return $record->update($data);
    }

    /**
     * Delete a record from the database for the given IDs
     *
     * @param Collection|array|int $ids
     *
     * @return int
     */
    public function delete($ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * Eager load database relationships
     *
     * @param array|string $relations
     *
     * @return Builder|Model
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
