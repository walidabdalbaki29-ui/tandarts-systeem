@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="min-h-screen bg-slate-50">

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900">
                Admin Dashboard
            </h1>

            <p class="text-slate-600 mt-2">
                Welkom terug! Hier vindt u een overzicht van de praktijk.
            </p>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-10">

            <!-- Afspraken vandaag -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center text-xl">
                        ✓
                    </div>

                    <span class="text-xs font-medium text-slate-500">
                        Vandaag
                    </span>
                </div>

                <p class="text-3xl font-bold text-slate-900 mb-1">
                    {{ $todayAppointments }}
                </p>

                <p class="text-sm text-slate-600">
                    Afspraken vandaag
                </p>
            </div>

            <!-- Totaal patiënten -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center text-xl">
                        ♙
                    </div>

                    <span class="text-xs font-medium text-slate-500">
                        Totaal
                    </span>
                </div>

                <p class="text-3xl font-bold text-slate-900 mb-1">
                    {{ $totalPatients }}
                </p>

                <p class="text-sm text-slate-600">
                    Totaal patiënten
                </p>
            </div>

            <!-- Diensten -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-12 h-12 rounded-xl bg-violet-50 text-violet-700 flex items-center justify-center text-xl">
                        +
                    </div>

                    <span class="text-xs font-medium text-slate-500">
                        Beschikbaar
                    </span>
                </div>

                <p class="text-3xl font-bold text-slate-900 mb-1">
                    {{ $totalServices }}
                </p>

                <p class="text-sm text-slate-600">
                    Diensten
                </p>
            </div>

            <!-- Afspraken in behandeling -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center text-xl">
                        ◷
                    </div>

                    <span class="text-xs font-medium text-amber-700">
                        Openstaand
                    </span>
                </div>

                <p class="text-3xl font-bold text-slate-900 mb-1">
                    {{ $pendingAppointments }}
                </p>

                <p class="text-sm text-slate-600">
                    Afwachtende afspraken
                </p>
            </div>

        </div>

        <!-- Upcoming appointments -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            <div class="p-6 border-b border-slate-200">
                <h2 class="text-xl font-bold text-slate-900">
                    Aankomende afspraken
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Een overzicht van de geplande afspraken.
                </p>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Datum
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Tijd
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Patiënt
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Dienst
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Status
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse ($recentAppointments as $appointment)
                            <tr class="hover:bg-slate-50 transition-colors">

                                <td class="px-6 py-4 text-sm text-slate-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-700 whitespace-nowrap">
                                    {{ substr($appointment->appointment_time, 0, 5) }}
                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                    {{ $appointment->user->name }}
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-700">
                                    {{ $appointment->service->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($appointment->status === 'confirmed')
                                        <span class="inline-flex items-center rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                            Bevestigd
                                        </span>
                                    @elseif ($appointment->status === 'pending')
                                        <span class="inline-flex items-center rounded-full bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700">
                                            In afwachting
                                        </span>
                                    @elseif ($appointment->status === 'cancelled')
                                        <span class="inline-flex items-center rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700">
                                            Geannuleerd
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">
                                            {{ $appointment->status }}
                                        </span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <p class="text-slate-500 text-sm">
                                        Er zijn nog geen afspraken geregistreerd.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection