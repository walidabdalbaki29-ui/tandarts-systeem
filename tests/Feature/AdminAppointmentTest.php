<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAppointmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_confirm_a_pending_appointment(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $patient = User::factory()->create([
            'role' => 'patient',
        ]);

        $service = Service::create([
            'name' => 'Tandartscontrole',
            'description' => 'Periodieke controle',
            'duration' => 30,
            'price' => 25.00,
        ]);

        $appointment = Appointment::create([
            'user_id' => $patient->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDays(2)->toDateString(),
            'appointment_time' => '10:00',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->patch(
            route('admin.appointments.confirm', $appointment)
        );

        $response->assertSessionHas(
            'success',
            'De afspraak is succesvol bevestigd.'
        );

        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'status' => 'confirmed',
        ]);
    }

    public function test_admin_can_cancel_an_appointment(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $patient = User::factory()->create([
            'role' => 'patient',
        ]);

        $service = Service::create([
            'name' => 'Tandartscontrole',
            'description' => 'Periodieke controle',
            'duration' => 30,
            'price' => 25.00,
        ]);

        $appointment = Appointment::create([
            'user_id' => $patient->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDays(2)->toDateString(),
            'appointment_time' => '11:00',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->patch(
            route('admin.appointments.cancel', $appointment)
        );

        $response->assertSessionHas(
            'success',
            'De afspraak is succesvol geannuleerd.'
        );

        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'status' => 'cancelled',
        ]);
    }
}
