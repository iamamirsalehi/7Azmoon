<?php

namespace App\repositories\Eloquent;

use App\Entities\Quiz\QuizEloquentEntity;
use App\Models\Quiz;
use App\repositories\Contracts\QuizRepositoryInterface;

class EloquentQuizRepository extends EloquentBaseRepository implements QuizRepositoryInterface
{
    protected $model = Quiz::class;

    public function create(array $data)
    {
        $createdQuiz = parent::create($data);

        return new QuizEloquentEntity($createdQuiz);
    }

    public function update(int $id, array $data)
    {
        if(!parent::update($id, $data))
        {
            throw new \RuntimeException('آزمون بروزرسانی نشد');
        }

        return new QuizEloquentEntity(parent::find($id));
    }
}
