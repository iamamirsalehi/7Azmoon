<?php

namespace App\repositories\Mongo;

use App\repositories\Contracts\RepositoryInterface;

class MongoBaseRepository implements RepositoryInterface
{

    public function create(array $data)
    {

    }

    public function update(int $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function all(array $where)
    {
        // TODO: Implement all() method.
    }

    public function delete(array $where)
    {
        // TODO: Implement delete() method.
    }

    public function find(int $id)
    {
        // TODO: Implement find() method.
    }
}
