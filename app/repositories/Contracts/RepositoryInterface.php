<?php

namespace App\repositories\Contracts;

interface RepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function all(array $where);

    public function delete(array $where);

    public function find(int $id);
}
