<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function show($id);
    public function update(array $data, $id);
    public function delete($id);
    public function with($relations);
}
