<?php

namespace App\repositories\Json;

use App\repositories\Contracts\RepositoryInterface;

class JsonBaseRepository implements RepositoryInterface
{

    public function create(array $data)
    {
        if(file_exists('users.json'))
        {
            $users = json_decode(file_get_contents('users.json'), true);
            $data['id'] = rand(1, 1000);
            array_push($users, $data);
            file_put_contents('users.json', json_encode($users));
        }else{
            $users = [];
            $data['id'] = rand(1, 1000);
            array_push($users, $data);
            file_put_contents('users.json', json_encode($users));
        }

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
