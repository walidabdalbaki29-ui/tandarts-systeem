<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $todayAppointments = Appointment::whereDate(
            'appointment_date',
            today()
        )
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        $totalPatients = User::where('role', 'patient')->count();

        $totalServices = Service::count();

        $pendingAppointments = Appointment::where(
            'status',
            'pending'
        )->count();

        $recentAppointments = Appointment::with(['user', 'service'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->whereDate('appointment_date', '>=', today())
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'todayAppointments',
            'totalPatients',
            'totalServices',
            'pendingAppointments',
            'recentAppointments'
        ));
    }
}
