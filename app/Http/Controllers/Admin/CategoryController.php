<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(self::PAGINATION);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create($request->all());

        return redirect()->route('admin.categories.index')->withToastSuccess('Added successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $this->categoryRepository->update($category, $request->all());

        return redirect()->route('admin.categories.index')->withToastSuccess('Updated successfully');
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category);

        return back()->withToastSuccess('Updated successfully');
    }


}
