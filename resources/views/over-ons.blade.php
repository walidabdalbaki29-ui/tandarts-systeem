@extends('layouts.app')

@section('title', 'Over ons')

@section('content')

<!-- Hero section -->
<section class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div>
                <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                    Over Nova Tandzorg
                </p>

                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight mb-6">
                    Uw glimlach is onze zorg
                </h1>

                <p class="text-lg text-slate-600 leading-relaxed mb-6">
                    Bij Nova Tandzorg staat uw mondgezondheid centraal.
                    Wij vinden het belangrijk dat u zich op uw gemak voelt
                    en met vertrouwen naar uw afspraak komt.
                </p>

                <p class="text-slate-600 leading-relaxed">
                    Daarom streven wij naar persoonlijke aandacht,
                    duidelijke uitleg en professionele tandheelkundige zorg.
                </p>

                <a
                    href="{{ route('appointments.create') }}"
                    class="inline-block mt-8 bg-teal-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-teal-700 transition"
                >
                    Maak een afspraak
                </a>
            </div>

            <div class="h-80 lg:h-[420px] rounded-2xl overflow-hidden">
                <img
                    src="{{ asset('images/over-ons.png') }}"
                    alt="De tandartspraktijk van Nova Tandzorg"
                    class="w-full h-full object-cover"
                >
            </div>

        </div>
    </div>
</section>

<!-- Over onze praktijk -->
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-6">

        <div class="max-w-3xl mx-auto text-center">
            <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                Onze praktijk
            </p>

            <h2 class="text-3xl font-bold text-slate-900 mb-6">
                Persoonlijke aandacht voor iedere patiënt
            </h2>

            <p class="text-slate-600 leading-relaxed mb-4">
                Iedereen verdient goede tandheelkundige zorg.
                Daarom vinden wij het belangrijk om naar uw wensen te luisteren
                en samen te kijken naar de zorg die bij u past.
            </p>

            <p class="text-slate-600 leading-relaxed">
                Of u nu komt voor een periodieke controle of een andere behandeling,
                wij willen dat u weet wat u kunt verwachten.
            </p>
        </div>

    </div>
</section>

<!-- Onze waarden -->
<section class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-10">
            <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                Waar wij voor staan
            </p>

            <h2 class="text-3xl font-bold text-slate-900">
                Goede zorg begint met vertrouwen
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white border border-slate-200 rounded-2xl p-7">
                <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-xl flex items-center justify-center text-xl mb-5">
                    ✓
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-3">
                    Persoonlijke aandacht
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    Wij luisteren naar uw vragen en houden rekening met uw wensen.
                </p>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-7">
                <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-xl flex items-center justify-center text-xl mb-5">
                    +
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-3">
                    Zorg en kwaliteit
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    Wij streven naar zorgvuldige behandelingen en duidelijke uitleg.
                </p>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-7">
                <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-xl flex items-center justify-center text-xl mb-5">
                    ♥
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-3">
                    Een vertrouwd gevoel
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    Wij willen dat u zich welkom en op uw gemak voelt tijdens uw bezoek.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- Call to action -->
<section class="bg-teal-700 py-14">
    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-3xl font-bold text-white mb-4">
            Heeft u vragen of wilt u een afspraak maken?
        </h2>

        <p class="text-teal-50 leading-relaxed mb-8">
            Bekijk onze behandelingen of neem contact met ons op.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">

            <a
                href="{{ route('appointments.create') }}"
                class="bg-white text-teal-700 px-6 py-3 rounded-lg font-semibold hover:bg-slate-100 transition"
            >
                Maak een afspraak
            </a>

            <a
                href="{{ route('home') }}"
                class="border border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-teal-600 transition"
            >
                Neem contact op
            </a>

        </div>

    </div>
</section>

@endsection