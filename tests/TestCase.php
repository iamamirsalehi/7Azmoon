<?php

use App\repositories\Contracts\CategoryRepositoryInterface;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    protected function createCategories(int $count = 1): array
    {
        $categoryRepository = $this->app->make(CategoryRepositoryInterface::class);

        $newCategory = [
            'name' => 'new category',
            'slug' => 'new-category',
        ];

        $categories = [];

        foreach (range(0, $count) as $item) {
            $categories[] = $categoryRepository->create($newCategory);
        }

        return $categories;
    }
}
