<?php

namespace App\repositories\Eloquent;

use App\repositories\Contracts\RepositoryInterface;

class EloquentBaseRepository implements RepositoryInterface
{
    protected $model;

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model::where('id', $id)->update($data);
    }

    public function all(array $where)
    {
        $query = $this->model::query();

        foreach ($where as $key => $value)
        {
            $query->where($key, $value);
        }

        return $query->get();
    }

    public function delete(int $id): bool
    {
        return $this->model::where('id', $id)->delete();
    }

    public function deleteBy(array $where)
    {
        $query = $this->model::query();

        foreach ($where as $key => $value)
        {
            $query->where($key, $value);
        }

        return $query->delete();
    }

    public function find(int $id)
    {
        return $this->model::find($id);
    }

    public function paginate(string $search = null, int $page, int $pagesize = 20): array
    {
        if(is_null($search))
        {
            return $this->model::paginate($pagesize, ['full_name', 'mobile', 'email'], null, $page)->toArray()['data'];
        }

        return $this->model::orWhere('full_name', $search)
            ->orWhere('mobile', $search)
            ->orWhere('email', $search)
            ->paginate($pagesize, ['full_name', 'mobile', 'email'], null, $page)->toArray()['data'];
    }
}
