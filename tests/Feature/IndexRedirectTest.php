<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexRedirectTest extends TestCase
{
    /**
     * Check root redirect to login page.
     */
    public function test_index_redirects_to_login_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
