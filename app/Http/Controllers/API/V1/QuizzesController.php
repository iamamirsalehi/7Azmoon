<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\contracts\APIController;
use App\repositories\Contracts\QuizRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuizzesController extends APIController
{
    public function __construct(private QuizRepositoryInterface $quizRepository)
    {
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'duration' => 'required|date',
        ]);

        $startDate = Carbon::parse($request->duration);
        $duration = Carbon::parse($request->duration);

        if ($duration->timestamp < $startDate->timestamp)
        {
            return $this->respondInvalidValiation('تاریخ شروع باید از زمان آزمون بزرگ تر باشد');
        }

        $createdQuiz = $this->quizRepository->create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $startDate->format('Y-m-d'),
            'duration' => $duration,
        ]);

        return $this->respondCreated('آزمون ساخته شد', [
            'category_id' => $createdQuiz->getCategoryId(),
            'title' => $createdQuiz->getTitle(),
            'description' => $createdQuiz->getDescription(),
            'start_date' => $createdQuiz->getStartDate(),
            'duration' => Carbon::parse($createdQuiz->getDuration())->timestamp,
        ]);
    }
}
