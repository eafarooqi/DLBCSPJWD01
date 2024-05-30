<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Genre;
use App\Services\CategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    use RefreshDatabase;

    protected CategoryService $categoryService;

    protected function setUp(): void
    {
        parent::setUp();

        // Initialize the CategoryService
        $this->categoryService = new CategoryService;
    }

    public function test_add_category()
    {
        $user = $this->createUserForTesting();

        // Data for the new category
        $data = [
            'name' => 'New Category',
        ];


        $category = $this->categoryService->addCategory($data);

        // Assert that the returned category is an object and has the correct attributes
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('New Category', $category->name);
        $this->assertEquals($user->id, $category->user_id);
    }

    public function test_update_category()
    {
        $this->createUserForTesting();

        // Create a category
        $category = Category::factory()->create([
            'name' => 'Old Category',
        ]);

        // New data to update the category
        $data = [
            'name' => 'Updated Category',
        ];

        // Call the updateCategory method
        $result = $this->categoryService->updateCategory($category, $data);

        // Refresh the category instance to get the updated values
        $category->refresh();

        // Assert that the update was successful
        $this->assertTrue($result);
        $this->assertEquals('Updated Category', $category->name);
    }

    public function test_delete_category()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create a category
        $category = Category::factory()->create([
            'name' => 'Test Category',
        ]);

        // Call the deleteCategory method
        $result = $this->categoryService->deleteCategory($category);

        // Assert that delete result was successful
        $this->assertTrue($result);

        // Assert that the category was deleted (soft delete)
        $this->assertSoftDeleted('categories', ['id' => $category->id]);
    }

    public function test_get_parent_categories()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create some parent categories
        $parent1 = Category::factory()->create(['name' => 'Parent 1']);
        $parent2 = Category::factory()->create(['name' => 'Parent 2']);

        // Create some child categories
        Category::factory()->create(['name' => 'Child 1', 'parent_id' => $parent1->id]);
        Category::factory()->create(['name' => 'Child 2', 'parent_id' => $parent2->id]);

        // Call the getParentCategories method
        $result = $this->categoryService->getParentCategories();

        // Assert that the result is a collection
        $this->assertInstanceOf(Collection::class, $result);

        // There should be only 2 results
        $this->assertCount(2, $result->toArray());

        // Assert that the result contains the correct parent categories
        // as we are using ids as array index.
        $this->assertEquals([
            $parent1->id => 'Parent 1',
            $parent2->id => 'Parent 2',
        ], $result->toArray());
    }

    public function test_get_category_options()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create some Categories
        $category1 = Category::factory()->create(['name' => 'Category 1']);
        $category2 = Category::factory()->create(['name' => 'Category 2']);

        // Ensure the cache is empty
        Cache::forget('CategoryOptions_opt_group');

        // Call the getCategoryOptions method
        $result = $this->categoryService->getCategoryOptions();

        // Assert that the result is a collection
        $this->assertInstanceOf(Collection::class, $result);

        // Assert that the result contains the correct categories
        $this->assertEquals([
            $category1->id => 'Category 1',
            $category2->id => 'Category 2',
        ], $result->pluck('name', 'id')->toArray());

        // Assert that the result is cached
        $cachedResult = Cache::get('CategoryOptions_opt_group');

        $this->assertNotNull($cachedResult);
        $this->assertEquals($result->toArray(), $cachedResult->toArray());
    }
}
