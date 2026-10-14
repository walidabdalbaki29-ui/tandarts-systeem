@extends('layouts.app')

@section('title', 'Diensten beheren')

@section('content')

<div class="min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-900">
                    Diensten beheren
                </h1>

                <p class="mt-2 text-slate-600">
                    Beheer de behandelingen van Nova Tandzorg.
                </p>
            </div>

            <a href="{{ route('admin.services.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-teal-600 px-5 py-3 font-medium text-white transition hover:bg-teal-700">
                + Dienst toevoegen
            </a>
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

        <!-- Services table -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 p-6">
                <h2 class="text-xl font-bold text-slate-900">
                    Alle diensten
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Een overzicht van de beschikbare behandelingen.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-fixed text-left">
                    <colgroup>
                        <col style="width: 43%">
                        <col style="width: 16%">
                        <col style="width: 13%">
                        <col style="width: 28%">
                    </colgroup>

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Naam
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Duur
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Prijs
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Acties
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse ($services as $service)
                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4">
                                <p class="font-medium text-slate-900">
                                    {{ $service->name }}
                                </p>

                                @if ($service->description)
                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $service->description }}
                                </p>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">
                                {{ $service->duration }} minuten
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">
                                € {{ number_format((float) $service->price, 2, ',', '.') }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex flex-wrap items-center gap-2">

                                    <!-- Bewerken -->
                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-teal-200 bg-teal-50 px-4 py-2.5 text-sm font-semibold text-teal-700 shadow-sm transition duration-200 hover:border-teal-300 hover:bg-teal-100 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a2.121 2.121 0 013 3l-11.5 11.5a4.5 4.5 0 01-1.897 1.13L5 19l.571-3.152a4.5 4.5 0 011.13-1.897l10.161-9.464z" />
                                        </svg>

                                        Bewerken
                                    </a>

                                    <!-- Verwijderen -->
                                    <form
                                        method="POST"
                                        action="{{ route('admin.services.destroy', $service) }}"
                                        onsubmit="return confirm('Weet je zeker dat je deze dienst wilt verwijderen?')">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-4 py-2.5 text-sm font-semibold text-red-600 shadow-sm transition duration-200 hover:border-red-300 hover:bg-red-50 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />
                                            </svg>

                                            Verwijderen
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <p class="text-sm text-slate-500">
                                    Er zijn nog geen diensten geregistreerd.
                                </p>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            @if ($services->hasPages())
            <div class="border-t border-slate-200 px-6 py-4">
                {{ $services->links() }}
            </div>
            @endif

        </div>

    </div>
</div>

@endsection