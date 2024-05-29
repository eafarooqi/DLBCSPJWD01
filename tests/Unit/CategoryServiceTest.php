<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
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
        $user = User::factory()->create();
        // Sample data for the new category
        $data = [
            'name' => 'New Category',
        ];

        $this->actingAs($user);
        $category = $this->categoryService->addCategory($data);

        // Assert that the returned category is an object and has the correct attributes
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('New Category', $category->name);
    }
}
