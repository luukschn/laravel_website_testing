<?php

namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Http\Controllers\UserRegistration;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user()
    {

        //more of a feature test? 

        $data = [
            'username' => 'pien', 
            'email' => 'pien@a.com',
            'password' => 'secret'
        ];

        $response = $this->post('/user/register', $data);
        // $response = $this->post('/registration', $data);

        $response->assertStatus(302)->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'username' => 'pien',
            'email' => 'pien@a.com'
        ]);
    }


    public function test_view_registration() {
        $response = $this->get('/registration');

        $response->assertSee('Insert your details to register.');
    }

    public function test_user_saved_to_database () {
        $user = Users::make([
            'username' => 'Ben',
            'email' => 'ben@a.com',
            'password' => Hash::make('password')
        ]);

        $user->save();

        $this->assertDatabaseHas('users', [
            'username' => 'Ben',
            'email' => 'ben@a.com'
        ]);
    }
}
