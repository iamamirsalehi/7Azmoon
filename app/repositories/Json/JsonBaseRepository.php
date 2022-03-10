<?php

namespace App\repositories\Json;

use App\repositories\Contracts\RepositoryInterface;

class JsonBaseRepository implements RepositoryInterface
{

    public function create(array $data)
    {
        if (file_exists('users.json')) {
            $users = json_decode(file_get_contents('users.json'), true);
            $data['id'] = rand(1, 1000);
            array_push($users, $data);
            file_put_contents('users.json', json_encode($users));
        } else {
            $users = [];
            $data['id'] = rand(1, 1000);
            array_push($users, $data);
            file_put_contents('users.json', json_encode($users));
        }

    }

    public function update(int $id, array $data)
    {
        $users = json_decode(file_get_contents('users.json'), true);
        foreach ($users as $key => $user) {

            if ($user['id'] == $id) {
                $user['full_name'] = $data['full_name'] ?? $user['full_name'];
                $user['mobile'] = $data['mobile'] ?? $user['mobile'];
                $user['email'] = $data['email'] ?? $user['email'];
                $user['password'] = $data['password'] ?? $user['password'];

                unset($users[$key]);
                array_push($users, $user);

                if (file_exists('users.json')) {
                    unlink('users.json');
                }

                file_put_contents('users.json', json_encode($users));
                break;
            }
        }
    }

    public function all(array $where)
    {
        // TODO: Implement all() method.
    }

    public function deleteBy(array $where)
    {
        // TODO: Implement deleteBy() method.
    }

    public function delete(int $id)
    {
        $users = json_decode(file_get_contents('users.json'), true);

        foreach ($users as $key => $user) {
            if ($user['id'] == $id) {
                unset($users[$key]);

                if (file_exists('users.json')) {
                    unlink('users.json');
                }

                file_put_contents('users.json', json_encode($users));
                break;
            }
        }
    }

    public function find(int $id)
    {
        // TODO: Implement find() method.
    }

    public function paginate(string $search = null, int $page, int $pagesize = 20)
    {
        $users = json_decode(file_get_contents(base_path() . '/users.json'), true);

        if(!is_null($search))
        {
            foreach ($users as $key => $user) {
                if(array_search($search, $user)){
                    return $users[$key];
                }
            }
        }


        $totalRecords = count($users);
        $totalPages = ceil($totalRecords / $pagesize);

        if ($page > $totalPages)
        {
            $page = $totalRecords;
        }

        if ($page < 1){
            $page = 1;
        }

        $offset = ($page - 1) * $pagesize;

        return array_slice($users, $offset, $pagesize);
    }
}
