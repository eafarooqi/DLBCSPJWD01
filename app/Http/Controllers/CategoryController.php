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
        // Authorization
        $this->authorize('viewAny', Category::class);

        // Loading listing template
        return view('templates.manage.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        // Authorization
        $this->authorize('create', Category::class);

        // Loading template data
        $data['categoryOptions'] = $this->categoryService->getParentCategories();

        // loading create template
        return view('templates.manage.category.create', $data);
    }

    public function store(CategoryRequest $request)
    {
        // Authorization
        $this->authorize('create', Category::class);

        // Creating new category
        $this->categoryService->addCategory($request->validated());

        // redirecting back to listing page.
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

        // Loading template data
        $data['category'] = $category;
        $data['categoryOptions'] = $this->categoryService->getParentCategories();

        // loading edit template
        return view('templates.manage.category.edit', $data);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        // Authorization
        $this->authorize('update', $category);

        // Updating category
        $this->categoryService->updateCategory($category, $request->validated());

        // Redirecting back to listing page
        return redirect()->route('manage.categories.index')->with('success', __('Record updated successfully'));
    }

    public function show(Category $category)
    {
        // Authorization
        $this->authorize('view', $category);

        // loading view template
        return view('templates.manage.category.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        // Authorization
        $this->authorize('delete', $category);

        // Deleting category
        $this->categoryService->deleteCategory($category);

        // Redirecting back to listing page
        return redirect()->route('manage.categories.index')->with('success', __('Record successfully deleted'));
    }
}
