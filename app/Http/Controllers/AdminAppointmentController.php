<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['user', 'service'])
            ->orderByDesc('appointment_date')
            ->orderByDesc('appointment_time')
            ->paginate(10);

        return view('admin.appointments.index', compact('appointments'));
    }
    public function confirm(Appointment $appointment): RedirectResponse
    {
        if ($appointment->status !== 'pending') {
            return back()->with(
                'error',
                'Deze afspraak kan niet worden bevestigd.'
            );
        }

        $appointment->update([
            'status' => 'confirmed',
        ]);

        return back()->with(
            'success',
            'De afspraak is succesvol bevestigd.'
        );
    }

    public function cancel(Appointment $appointment): RedirectResponse
    {
        if ($appointment->status === 'cancelled') {
            return back()->with(
                'error',
                'Deze afspraak is al geannuleerd.'
            );
        }

        $appointment->update([
            'status' => 'cancelled',
        ]);

        return back()->with(
            'success',
            'De afspraak is succesvol geannuleerd.'
        );
    }

}
