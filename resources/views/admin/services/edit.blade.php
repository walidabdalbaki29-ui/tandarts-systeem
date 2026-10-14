@extends('layouts.app')

@section('title', 'Dienst bewerken')

@section('content')

<div class="min-h-screen bg-slate-50">
    <div class="max-w-3xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('admin.services.index') }}"
                class="text-sm font-medium text-teal-700 hover:text-teal-900">
                &larr; Terug naar diensten
            </a>

            <h1 class="mt-4 text-3xl font-bold text-slate-900">
                Dienst bewerken
            </h1>

            <p class="mt-2 text-slate-600">
                Wijzig de gegevens van {{ $service->name }}.
            </p>
        </div>

        <!-- Form -->
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

            <form method="POST"
                action="{{ route('admin.services.update', $service) }}"
                class="space-y-6">

                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                        Naam van de dienst
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $service->name) }}"
                        required
                        maxlength="255"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none transition focus:border-teal-600 focus:ring-2 focus:ring-teal-100">

                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-2 block text-sm font-medium text-slate-700">
                        Beschrijving
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none transition focus:border-teal-600 focus:ring-2 focus:ring-teal-100">{{ old('description', $service->description) }}</textarea>

                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Duration and price -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                    <div>
                        <label for="duration" class="mb-2 block text-sm font-medium text-slate-700">
                            Duur (minuten)
                        </label>

                        <input
                            type="number"
                            id="duration"
                            name="duration"
                            value="{{ old('duration', $service->duration) }}"
                            min="1"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none transition focus:border-teal-600 focus:ring-2 focus:ring-teal-100">

                        @error('duration')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="mb-2 block text-sm font-medium text-slate-700">
                            Prijs (€)
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price', $service->price) }}"
                            min="0"
                            step="0.01"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none transition focus:border-teal-600 focus:ring-2 focus:ring-teal-100">

                        @error('price')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Actions -->
                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('admin.services.index') }}"
                        class="rounded-lg border border-slate-300 px-5 py-3 text-center font-medium text-slate-700 transition hover:bg-slate-50">
                        Annuleren
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-teal-600 px-5 py-3 font-medium text-white transition hover:bg-teal-700">
                        Wijzigingen opslaan
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

@endsection