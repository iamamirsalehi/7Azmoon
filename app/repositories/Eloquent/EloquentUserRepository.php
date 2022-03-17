<?php

namespace App\repositories\Eloquent;

use App\Entities\User\UserEloquentEntity;
use App\Models\User;
use App\repositories\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    protected $model = User::class;

    public function create(array $data)
    {
        $newUser =  parent::create($data);

        return new UserEloquentEntity($newUser);
    }
}
