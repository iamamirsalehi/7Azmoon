<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\contracts\APIController;
use App\repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoriesController extends APIController
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2|max:255',
            'slug' => 'required|string|min:2|max:255',
        ]);

        $createdCategory = $this->categoryRepository->create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return $this->respondCreated('دسته بندی ایجاد شد', [
            'name' => $createdCategory->getName(),
            'slug' => $createdCategory->getSlug(),
        ]);
    }
}
