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
        $user = User::factory()->make();
        // Sample data for the new category
        $data = [
            'name' => 'New Category',
            'user_id' => $user->id
        ];

        //Auth::login($user);
        $this->actingAs($user);

        //dd($user);

        $category = $this->categoryService->addCategory($data);

        //Category::factory()->create(['title' => 'New Category 1', 'user_id' => $user->id]);
        //$this->actingAs($user);

        //$response = $this->actingAs($user, 'web')->withSession(['banned' => false]);

        // Call the addCategory method


        // Assert that the returned category is an object and has the correct attributes
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('New Category', $category->name);
    }
}
