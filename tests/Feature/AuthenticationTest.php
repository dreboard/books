<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * Test home page
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

    }

    /**
     * Test text on home page
     *
     * @return void
     */
    public function testWelcomeView()
    {
        $view = $this->view('welcome');
        $view->assertSee('Search Google Books');
    }

    /**
     * Test connection to google api
     *
     * @return void
     */
    public function testGoogleAPIAuth()
    {
        $response = $this->post('/search', ['search' => 'Linux']);
        $response
            ->assertStatus(200);
    }

    /**
     * Test valid API search
     *
     * @return void
     */
    public function testGoogleAPIResponse()
    {
        $response = $this->post('/search', ['search' => 'Linux']);
        $response->assertSee("Solaris to Linux Migration:");
    }
}

