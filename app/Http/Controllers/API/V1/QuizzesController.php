<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\contracts\APIController;
use App\Models\Quiz;
use App\repositories\Contracts\QuizRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuizzesController extends APIController
{
    public function __construct(private QuizRepositoryInterface $quizRepository)
    {
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            'search' => 'nullable|string',
            'page' => 'required|numeric',
            'pagesize' => 'nullable|numeric',
        ]);

        $quizzes = $this->quizRepository->paginate($request->search, $request->page, $request->pagesize ?? 0, ['title', 'description', 'start_date', 'duration']);

        return $this->respondSuccess('آزمون ها', $quizzes);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'duration' => 'required|date',
            'is_active' => 'required|bool',
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
            'is_active' => $request->is_active
        ]);

        return $this->respondCreated('آزمون ساخته شد', [
            'category_id' => $createdQuiz->getCategoryId(),
            'title' => $createdQuiz->getTitle(),
            'description' => $createdQuiz->getDescription(),
            'start_date' => $createdQuiz->getStartDate(),
            'duration' => Carbon::parse($createdQuiz->getDuration())->timestamp,
            'is_active' => $createdQuiz->getIsActive(),
        ]);
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
           'id' => 'required|numeric',
        ]);

        if(!$this->quizRepository->find($request->id))
        {
            return $this->respondNotFound('آزمون وجود ندارد');
        }

        if(!$this->quizRepository->delete($request->id))
        {
            return $this->respondInternalError('آزمون حذف نشد');
        }

        return $this->respondSuccess('آزمون حذف شد', []);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'duration' => 'required|date',
            'is_active' => 'required|bool',
        ]);


        $startDate = Carbon::parse($request->duration);
        $duration = Carbon::parse($request->duration);

        if ($duration->timestamp < $startDate->timestamp)
        {
            return $this->respondInvalidValiation('تاریخ شروع باید از زمان آزمون بزرگ تر باشد');
        }

        try {
            $updatedQuiz = $this->quizRepository->update($request->id, [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $startDate->format('Y-m-d'),
                'duration' => $duration,
                'is_active' => $request->is_active,
            ]);
        }catch (\Exception $e){
            return $this->respondInternalError('آزمون بروزرسانی نشد');
        }

        return $this->respondSuccess('آزمون بروزرسانی شد', [
            'category_id' => $updatedQuiz->getCategoryId(),
            'title' => $updatedQuiz->getTitle(),
            'description' => $updatedQuiz->getDescription(),
            'start_date' => $updatedQuiz->getStartDate(),
            'duration' => Carbon::parse($updatedQuiz->getDuration())->timestamp,
            'is_active' => $updatedQuiz->getIsActive(),
        ]);
    }
}
