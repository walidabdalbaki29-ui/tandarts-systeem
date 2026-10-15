<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_cannot_book_an_appointment_in_the_past(): void
    {
        $patient = User::factory()->create([
            'role' => 'patient',
        ]);

        $service = Service::create([
            'name' => 'Controle',
            'description' => 'Periodieke controle',
            'duration' => 30,
            'price' => 25.00,
        ]);

        $response = $this->actingAs($patient)->post(
            route('appointments.store'),
            [
                'service_id' => $service->id,
                'appointment_date' => now()->subDay()->toDateString(),
                'appointment_time' => '10:00',
            ]
        );

        $response->assertSessionHasErrors('appointment_date');

        $this->assertDatabaseCount('appointments', 0);
    }


    public function test_patient_cannot_book_an_overlapping_appointment(): void
    {
        $firstPatient = User::factory()->create([
            'role' => 'patient',
        ]);

        $secondPatient = User::factory()->create([
            'role' => 'patient',
        ]);

        $service = Service::create([
            'name' => 'Controle',
            'description' => 'Periodieke controle',
            'duration' => 30,
            'price' => 25.00,
        ]);

        Appointment::create([
            'user_id' => $firstPatient->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDay()->toDateString(),
            'appointment_time' => '10:00',
            'status' => 'confirmed',
        ]);

        $response = $this->actingAs($secondPatient)->post(
            route('appointments.store'),
            [
                'service_id' => $service->id,
                'appointment_date' => now()->addDay()->toDateString(),
                'appointment_time' => '10:15',
            ]
        );

        $response->assertSessionHasErrors('appointment_time');

        $this->assertDatabaseCount('appointments', 1);
    }

}
