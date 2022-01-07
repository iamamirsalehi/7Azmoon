<?php

namespace App\repositories\Eloquent;

use App\Models\User;
use App\repositories\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    protected $model = User::class;
}
