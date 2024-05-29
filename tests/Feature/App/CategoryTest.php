<?php

namespace Tests\Feature\App;

use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_listing_screen_can_be_rendered(): void
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/manage/categories');
        $response->assertStatus(200);
    }

    public function test_category_add_screen_can_be_rendered(): void
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/manage/categories/create');
        $response->assertStatus(200);
    }
}
