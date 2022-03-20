<?php

namespace API\V1\Quizzes;

use App\repositories\Contracts\CategoryRepositoryInterface;
use Carbon\Carbon;

class QuizzesTest extends \TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
    }

    public function test_ensure_that_we_can_create_a_new_quiz()
    {
        $category = $this->createCategories()[0];

        $startDate = Carbon::now()->addDay();
        $duration = Carbon::now()->addDay();

        $quizData = [
            'category_id' => $category->getId(),
            'title' => 'quiz 1',
            'description' => 'this is a new quiz for test',
            'start_date' => $startDate,
            'duration' => $duration->addMinutes(60),
        ];

        $response = $this->call('POST', 'api/v1/quizzes', $quizData);
        $responseData = json_decode($response->getContent(), true)['data'];
        $quizData['start_date'] = $quizData['start_date']->format('Y-m-d');
        $quizData['duration'] = $quizData['duration']->format('Y-m-d H:i:s');

        $this->assertEquals(201, $response->getStatusCode());
        $this->seeInDatabase('quizzes', $quizData);
        $this->assertEquals($quizData['title'], $responseData['title']);
        $this->seeJsonStructure([
            'success',
            'message',
            'data' => [
                'category_id',
                'title',
                'description',
                'start_date',
                'duration',
            ],
        ]);
    }
}
