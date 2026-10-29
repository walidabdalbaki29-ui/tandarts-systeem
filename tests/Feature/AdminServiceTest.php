<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_service(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->post(
            route('admin.services.store'),
            [
                'name' => 'Tandartscontrole',
                'description' => 'Periodieke controle van het gebit',
                'duration' => 30,
                'price' => 50.00,
            ]
        );

        $response->assertRedirect(route('admin.services.index'));

        $this->assertDatabaseHas('services', [
            'name' => 'Tandartscontrole',
            'description' => 'Periodieke controle van het gebit',
            'duration' => 30,
            'price' => 50.00,
        ]);
    }

    public function test_admin_can_update_a_service(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $service = Service::create([
            'name' => 'Tandartscontrole',
            'description' => 'Oude beschrijving',
            'duration' => 30,
            'price' => 50.00,
        ]);

        $response = $this->actingAs($admin)->put(
            route('admin.services.update', $service),
            [
                'name' => 'Uitgebreide controle',
                'description' => 'Nieuwe beschrijving',
                'duration' => 45,
                'price' => 35.00,
            ]
        );

        $response->assertRedirect(route('admin.services.index'));

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'name' => 'Uitgebreide controle',
            'description' => 'Nieuwe beschrijving',
            'duration' => 45,
            'price' => 35.00,
        ]);
    }
    public function test_admin_can_delete_a_service(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $service = Service::create([
            'name' => 'Tandartscontrole',
            'description' => 'Periodieke controle',
            'duration' => 30,
            'price' => 50.00,
        ]);

        $response = $this->actingAs($admin)->delete(
            route('admin.services.destroy', $service)
        );

        $response->assertRedirect(route('admin.services.index'));

        $this->assertDatabaseMissing('services', [
            'id' => $service->id,
        ]);
    }
}
