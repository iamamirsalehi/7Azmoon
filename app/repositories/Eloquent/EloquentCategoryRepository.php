<?php

namespace App\repositories\Eloquent;

use App\Entities\Category\CategoryEloquentEntity;
use App\Models\Category;
use App\repositories\Contracts\CategoryRepositoryInterface;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepositoryInterface
{
    protected $model = Category::class;

    public function create(array $data)
    {
        $createdCategory = parent::create($data);

        return new CategoryEloquentEntity($createdCategory);
    }
}
