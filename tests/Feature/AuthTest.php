<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test Patient',
            'email' => 'patient@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('users', [
            'email' => 'patient@example.com',
            'role' => 'patient',
        ]);
    }

    public function test_registered_patient_password_is_hashed(): void
    {
        $this->post('/register', [
            'name' => 'Test Patient',
            'email' => 'patient@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $user = User::where('email', 'patient@example.com')->firstOrFail();

        $this->assertNotSame('Password123!', $user->password);
        $this->assertTrue(
            \Illuminate\Support\Facades\Hash::check(
                'Password123!',
                $user->password
            )
        );
    }
}
