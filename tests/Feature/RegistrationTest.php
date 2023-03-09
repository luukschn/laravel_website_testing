<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /*
    The culprit is RfreshDatabase:
    There is no column with name "name" on table "users".

    This probably tries to reference the users model
    */
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_registration_get()
    {
        $response = $this->get('/registration');

        $response->assertStatus(200);
    }

    public function test_registration_functionality() {
        $response = $this->post('/user/register', [
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com'
        ]);
    }
}
