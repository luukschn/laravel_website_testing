<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homgepage_get()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_registration_get() {

        $response = $this->get('/registration');

        $response->assertStatus(200);
    }

    public function test_login_get() {
        
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_sudoku_get() {
        
        $response = $this->get('/sudoku');

        $response->assertStatus(200);
    }

    public function assessment_test_get() {

        $response = $this->get('/assessment');

        $response->assertStatus(200);
    }
}
