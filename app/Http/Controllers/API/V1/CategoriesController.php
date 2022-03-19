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

    public function index(Request $request)
    {
        $this->validate($request, [
            'search' => 'nullable|string',
            'page' => 'required|numeric',
            'pagesize' => 'nullable|numeric',
        ]);

        $categories = $this->categoryRepository->paginate($request->search, $request->page, $request->pagesize ?? 20, ['name', 'slug']);

        return $this->respondSuccess('دسته بندی ها', $categories);
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

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
        ]);

        if (!$this->categoryRepository->find($request->id)) {
            return $this->respondNotFound('دسته بندی وجود ندارد');
        }

        if (!$this->categoryRepository->delete($request->id)) {
            return $this->respondInternalError('دسته بندی حذف نشد');
        }

        return $this->respondSuccess('دسته بندی حذف شد', []);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'name' => 'required|string|min:2|max:255',
            'slug' => 'required|string|min:2|max:255',
        ]);

        try {
            $updatedUser = $this->categoryRepository->update($request->id, [
                'name' => $request->name,
                'slug' => $request->slug,
            ]);
        }catch (\Exception $e){
            return $this->respondInternalError('دسته بندی بروزرسانی نشد');
        }

        return $this->respondSuccess('دسته بندی بروزرسانی شد', [
            'name' => $updatedUser->getName(),
            'slug' => $updatedUser->getSlug(),
        ]);
    }
}
