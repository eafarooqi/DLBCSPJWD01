<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryService extends BaseService
{
    /**
     * Create new category
     *
     * @param array $data
     * @return Category
     */
    public function addCategory(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * Update category
     *
     * @param Category $category
     * @param array $data
     * @return bool
     */
    public function updateCategory(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    /**
     * Delete category
     *
     * @param Category $category
     * @return bool
     */
    public function deleteCategory(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * Return only parent categories.
     *
     * @return Collection
     */
    public function getParentCategories(): Collection
    {
        return Category::parents()->pluck('name','id');
    }

    /**
     * Return category list for dropdowns.
     *
     * @return Collection
     */
    public function getCategoryOptions(): Collection
    {
        return Category::getCategoryOptionsWithGroup();
    }

    /**
     * Get total categories for the current user
     *
     * @return int
     */
    public function getCategoriesCount(): int
    {
        return Category::count();
    }
}
