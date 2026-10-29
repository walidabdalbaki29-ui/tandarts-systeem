@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 py-16 md:py-20">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Tekst -->
            <div>

                <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-4">
                    Welkom bij onze tandartspraktijk
                </p>

                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight mb-6">
                    Gezonde tanden,
                    <span class="text-teal-600">
                        een stralende glimlach
                    </span>
                </h1>

                <p class="text-lg text-slate-600 leading-relaxed mb-8 max-w-xl">
                    Wij bieden professionele en persoonlijke tandzorg
                    voor een gezond en stralend gebit.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">

                    <a
                        href="{{ route('login') }}"
                        class="text-center bg-teal-600 text-white px-6 py-3 rounded-lg
                               font-semibold hover:bg-teal-700 transition">
                        Afspraak maken
                    </a>

                    <a
                        href="/diensten"
                        class="text-center border border-teal-600 text-teal-700 px-6 py-3
                               rounded-lg font-semibold hover:bg-teal-50 transition">
                        Onze diensten
                    </a>

                </div>

            </div>

            <!-- Afbeelding -->
            <div class="h-80 md:h-96 rounded-2xl overflow-hidden shadow-sm">

                <img
                    src="{{ asset('images/tandartspraktijk.jpeg') }}"
                    alt="Hero afbeelding"
                    class="w-full h-full object-cover">

            </div>

        </div>

    </div>
</section>
<section class="bg-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-teal-50 flex items-center justify-center">
                    <span class="text-teal-600 text-xl">✓</span>
                </div>

                <h3 class="font-bold text-slate-900 mb-2">
                    Professionele zorg
                </h3>

                <p class="text-sm text-slate-600">
                    Professionele tandzorg met aandacht voor kwaliteit.
                </p>
            </div>

            <div class="text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-teal-50 flex items-center justify-center">
                    <span class="text-teal-600 text-xl">♥</span>
                </div>

                <h3 class="font-bold text-slate-900 mb-2">
                    Persoonlijke aandacht
                </h3>

                <p class="text-sm text-slate-600">
                    Wij luisteren naar uw wensen en zorgen voor persoonlijke aandacht.
                </p>
            </div>

            <div class="text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-teal-50 flex items-center justify-center">
                    <span class="text-teal-600 text-xl">★</span>
                </div>

                <h3 class="font-bold text-slate-900 mb-2">
                    Kwaliteit
                </h3>

                <p class="text-sm text-slate-600">
                    Betrouwbare zorg met moderne behandelmethoden.
                </p>
            </div>

            <div class="text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-teal-50 flex items-center justify-center">
                    <span class="text-teal-600 text-xl">+</span>
                </div>

                <h3 class="font-bold text-slate-900 mb-2">
                    Moderne praktijk
                </h3>

                <p class="text-sm text-slate-600">
                    Een moderne omgeving voor comfortabele tandzorg.
                </p>
            </div>

        </div>

    </div>
</section>
<section class="bg-slate-50 py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-center">

            <!-- Tekst links -->
            <div class="lg:col-span-2">

                <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                    Onze diensten
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                    Tandheelkundige zorg op maat
                </h2>

                <p class="text-slate-600 leading-relaxed mb-7">
                    Wij bieden een breed scala aan tandheelkundige behandelingen.
                    Bekijk onze diensten en kies de zorg die bij u past.
                </p>

                <a
                    href="/diensten"
                    class="inline-block bg-teal-600 text-white px-5 py-3 rounded-lg
                           font-semibold hover:bg-teal-700 transition">
                    Alle diensten bekijken
                </a>

            </div>


            <!-- Diensten-->
            <div class="lg:col-span-3">

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                    @foreach ($services as $service)

                    <div class="bg-white border border-slate-200 rounded-xl p-3
                shadow-sm hover:shadow-md transition overflow-x-hidden width-full">

                        <div class="h-24 rounded-lg mb-3 overflow-hidden">
                            <img
                                src="{{ asset('images/' . $service->image) }}"
                                alt="{{ $service->name }}"
                                class="w-full h-full object-cover">
                        </div>

                        <h3 class="font-bold text-slate-900 text-sm mb-2">
                            {{ $service->name }}
                        </h3>

                        <p class="text-xs text-slate-500 mb-3">
                            {{ $service->description }}
                        </p>

                        <p class="text-sm font-semibold text-slate-900 mb-2">
                            Vanaf € {{ number_format($service->price, 2, ',', '.') }}
                        </p>

                        <a
                            href="/diensten"
                            class="text-teal-600 text-xs font-semibold hover:text-teal-700">
                            Alle diensten →
                        </a>

                    </div>

                    @endforeach
                </div>

            </div>

        </div>

    </div>
</section>
<section class="bg-white py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

            <!-- Afbeelding -->
            <div class="h-72 md:h-96 bg-slate-100 rounded-2xl flex items-center justify-center">
                <span class="text-slate-400">
                    <img
                        src="{{ asset('images/HOME-2.png') }}"
                        alt="Over ons afbeelding"
                        class="w-full h-full object-cover rounded-2xl">
                </span>
            </div>

            <!-- Tekst -->
            <div>

                <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                    Over ons
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-5">
                    Onze zorg is onze prioriteit
                </h2>

                <p class="text-slate-600 leading-relaxed mb-4">
                    Bij onze tandartspraktijk staat persoonlijke en professionele
                    tandzorg centraal. Wij vinden het belangrijk dat iedere patiënt
                    zich op zijn gemak voelt.
                </p>

                <p class="text-slate-600 leading-relaxed mb-7">
                    Met aandacht voor kwaliteit en moderne behandelingen werken wij
                    samen aan een gezonde en stralende glimlach.
                </p>

                <a
                    href="/over-ons"
                    class="inline-block bg-teal-600 text-white px-5 py-3 rounded-lg
                           font-semibold hover:bg-teal-700 transition">
                    Meer over ons
                </a>

            </div>

        </div>

    </div>
</section>
<section class="bg-blue-50 border-y border-blue-100 py-5">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col md:flex-row items-center justify-between gap-5">

            <!-- Tekst -->
            <div class="flex items-center gap-5">

                <!-- Icon -->
                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shrink-0">
                    <span class="text-blue-600 text-2xl">
                        📅
                    </span>
                </div>

                <div>
                    <h2 class="text-lg md:text-xl font-bold text-slate-900">
                        Maak eenvoudig een afspraak
                    </h2>

                    <p class="text-sm text-slate-600 mt-1">
                        Plan vandaag nog uw afspraak en zet de eerste stap naar een gezonde glimlach.
                    </p>
                </div>

            </div>

            <a
                href="{{ route('services.index') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg
                       font-semibold text-sm hover:bg-blue-700 transition
                       whitespace-nowrap">
                Afspraak maken
            </a>

        </div>

    </div>
</section>

@endsection