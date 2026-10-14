@extends('layouts.app')

@section('title', 'Afspraken beheren')

@section('content')

<div class="min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900">
                Afspraken beheren
            </h1>

            <p class="text-slate-600 mt-2">
                Bekijk, bevestig en annuleer afspraken van patiënten.
            </p>
        </div>

        <!-- Success message -->
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error message -->
        @if (session('error'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <!-- Appointments table -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 p-6">
                <h2 class="text-xl font-bold text-slate-900">
                    Alle afspraken
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Beheer de afspraken en bekijk hun actuele status.
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

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Acties
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse ($appointments as $appointment)
                            <tr class="transition hover:bg-slate-50">

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">
                                    {{ substr($appointment->appointment_time, 0, 5) }}
                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                    {{ $appointment->user->name }}
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-700">
                                    {{ $appointment->service->name }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($appointment->status === 'confirmed')
                                        <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                            Bevestigd
                                        </span>
                                    @elseif ($appointment->status === 'pending')
                                        <span class="inline-flex rounded-full bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700">
                                            In afwachting
                                        </span>
                                    @elseif ($appointment->status === 'cancelled')
                                        <span class="inline-flex rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700">
                                            Geannuleerd
                                        </span>
                                    @else
                                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">
                                            {{ $appointment->status }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap items-center gap-2">

                                        @if ($appointment->status === 'pending')
                                            <form
                                                method="POST"
                                                action="{{ route('admin.appointments.confirm', $appointment) }}"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="rounded-lg bg-teal-600 px-3 py-2 text-xs font-medium text-white transition hover:bg-teal-700"
                                                >
                                                    Bevestigen
                                                </button>
                                            </form>
                                        @endif

                                        @if ($appointment->status !== 'cancelled')
                                            <form
                                                method="POST"
                                                action="{{ route('admin.appointments.cancel', $appointment) }}"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="rounded-lg border border-red-200 bg-white px-3 py-2 text-xs font-medium text-red-600 transition hover:bg-red-50"
                                                >
                                                    Annuleren
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <p class="text-sm text-slate-500">
                                        Er zijn nog geen afspraken geregistreerd.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($appointments->hasPages())
                <div class="border-t border-slate-200 px-6 py-4">
                    {{ $appointments->links() }}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection