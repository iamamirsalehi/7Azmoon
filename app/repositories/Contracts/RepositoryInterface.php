<?php

namespace App\repositories\Contracts;

interface RepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function all(array $where);

    public function deleteBy(array $where);

    public function delete(int $id): bool;

    public function find(int $id);

    public function paginate(string $search = null, int $page, int $pagesize = 20): array;
}
