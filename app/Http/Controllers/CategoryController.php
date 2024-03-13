<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class CategoryController extends AdminController
{

    public function __construct(
        private readonly CategoryService $categoryService
    )
    {
        parent::__construct();
    }

    public function index(): View
    {
        $this->authorize('viewAny', Category::class);
        return view('templates.manage.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Category::class);

        $data['categoryOptions'] = $this->categoryService->getParentCategories();
        return view('templates.manage.category.create', $data);
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);
        Category::create($request->validated());
        return redirect()->route('manage.categories.index')->with('success', __('Record created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function edit(Category $category)
    {
        // Authorization
        $this->authorize('update', $category);

        // Template data
        $data['category'] = $category;
        $data['categoryOptions'] = $this->categoryService->getParentCategories();

        // loading template
        return view('templates.manage.category.edit', $data);
    }

    public function show(Category $category)
    {
        $this->authorize('view', $category);
        return view('templates.manage.category.show', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);
        $category->update($request->validated());
        return redirect()->route('manage.categories.index')->with('success', __('Record updated successfully'));
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->route('manage.categories.index')->with('success', __('Record successfully deleted'));
    }
}