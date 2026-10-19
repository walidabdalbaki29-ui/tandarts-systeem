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
    public function test_patient_cannot_cancel_another_patients_appointment(): void
    {
        $owner = User::factory()->create([
            'role' => 'patient',
        ]);

        $otherPatient = User::factory()->create([
            'role' => 'patient',
        ]);

        $service = Service::create([
            'name' => 'Controle',
            'description' => 'Periodieke controle',
            'duration' => 30,
            'price' => 25.00,
        ]);

        $appointment = Appointment::create([
            'user_id' => $owner->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDay()->toDateString(),
            'appointment_time' => '10:00',
            'status' => 'confirmed',
        ]);

        $response = $this->actingAs($otherPatient)->patch(
            route('appointments.cancel', $appointment)
        );

        $response->assertForbidden();

        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'user_id' => $owner->id,
            'status' => 'confirmed',
        ]);
    }

    public function test_patient_can_book_an_available_appointment(): void
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

        $date = now()->addDays(2)->toDateString();

        $response = $this->actingAs($patient)->post(
            route('appointments.store'),
            [
                'service_id' => $service->id,
                'appointment_date' => $date,
                'appointment_time' => '10:00',
            ]
        );

        $response->assertRedirect('/');

        $this->assertDatabaseHas('appointments', [
            'user_id' => $patient->id,
            'service_id' => $service->id,
            'appointment_date' => $date,
            'appointment_time' => '10:00',
            'status' => 'pending',
        ]);
    }

    public function test_patient_can_only_view_their_own_appointments(): void
    {
        $patient = User::factory()->create([
            'role' => 'patient',
        ]);

        $otherPatient = User::factory()->create([
            'role' => 'patient',
        ]);

        $service = Service::create([
            'name' => 'Controle',
            'description' => 'Periodieke controle',
            'duration' => 30,
            'price' => 25.00,
        ]);

        $ownAppointment = Appointment::create([
            'user_id' => $patient->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDay()->toDateString(),
            'appointment_time' => '10:00',
            'status' => 'confirmed',
        ]);

        Appointment::create([
            'user_id' => $otherPatient->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDay()->toDateString(),
            'appointment_time' => '11:00',
            'status' => 'confirmed',
        ]);

        $response = $this->actingAs($patient)->get(
            route('appointments.index')
        );

        $response->assertOk();
        $response->assertViewHas('appointments', function ($appointments) use ($ownAppointment) {
            return $appointments->count() === 1
                && $appointments->first()->id === $ownAppointment->id;
        });
    }
    public function test_patient_can_cancel_their_own_appointment(): void
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

        $appointment = Appointment::create([
            'user_id' => $patient->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDay()->toDateString(),
            'appointment_time' => '10:00',
            'status' => 'confirmed',
        ]);

        $response = $this->actingAs($patient)->patch(
            route('appointments.cancel', $appointment)
        );

        $response->assertRedirect(route('appointments.index'));

        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'user_id' => $patient->id,
            'status' => 'cancelled',
        ]);
    }
}
