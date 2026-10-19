<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        $service = Service::findOrFail($request->service);

        $availableTimes = [
            '07:00','08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00','17:00'
        ];

        if ($request->filled('appointment_date')) {
            $date = $request->input('appointment_date');

            $appointments = Appointment::with('service')
                ->whereDate('appointment_date', $date)
                ->whereIn('status', ['pending', 'confirmed'])
                ->get();

            $availableTimes = collect($availableTimes)->filter(
                function ($time) use ($date, $appointments, $service) {
                    $start = Carbon::parse("$date $time");

                    if ($start->lessThanOrEqualTo(now())) {
                        return false;
                    }

                    $end = $start->copy()->addMinutes($service->duration);

                    foreach ($appointments as $appointment) {
                        $existingStart = Carbon::parse(
                            $appointment->appointment_date . ' ' .
                                $appointment->appointment_time
                        );

                        $existingEnd = $existingStart->copy()->addMinutes(
                            $appointment->service->duration
                        );

                        if ($start < $existingEnd && $end > $existingStart) {
                            return false;
                        }
                    }

                    return true;
                }
            )->values()->all();
        }

        return view('appointments.create', compact('service', 'availableTimes'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'appointment_time' => ['required', 'date_format:H:i'],
        ]);
        $service = Service::findOrFail($validated['service_id']);

        $start = Carbon::createFromFormat(
            'Y-m-d H:i',
            $validated['appointment_date'] . ' ' . $validated['appointment_time'],
            config('app.timezone')
        );

        if ($start->lessThanOrEqualTo(now())) {
            return back()
                ->withErrors([
                    'appointment_time' => 'Je kunt geen afspraak in het verleden boeken.',
                ])
                ->withInput();
        }

        $end = $start->copy()->addMinutes($service->duration);

        $appointments = Appointment::whereDate(
            'appointment_date',
            $validated['appointment_date']
        )
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        foreach ($appointments as $appointment) {
            $existingService = Service::findOrFail($appointment->service_id);

            $existingStart = Carbon::parse(
                $appointment->appointment_date . ' ' . $appointment->appointment_time
            );

            $existingEnd = $existingStart->copy()->addMinutes(
                $existingService->duration
            );

            if ($start < $existingEnd && $end > $existingStart) {
                return back()
                    ->withErrors([
                        'appointment_time' => 'Dit tijdstip is niet meer beschikbaar.',
                    ])
                    ->withInput();
            }
        }


        Appointment::create([
            'user_id' => Auth::id(),
            'service_id' => $validated['service_id'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'start_time' => $start,
            'end_time' => $end,
            'status' => 'pending',
        ]);

        return redirect('/')->with(
            'success',
            'Je afspraak is succesvol aangevraagd.'
        );
    }

    public function index()
    {
        $appointments = Appointment::with('service')
            ->where('user_id', Auth::id())
            ->get();
        return view("appointments.index", compact('appointments'));
    }

    public function cancel(Appointment $appointment)
    {
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }

        $appointment->status = 'cancelled';
        $appointment->save();

        return redirect()->route('appointments.index')->with(
            'success',
            'Je afspraak is succesvol geannuleerd.'
        );
    }
}
