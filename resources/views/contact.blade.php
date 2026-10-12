@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<!-- Hero -->
<section class="bg-slate-50 py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <span class="inline-block bg-teal-50 text-teal-700 text-sm font-semibold px-4 py-2 rounded-full mb-5">
            Contact
        </span>

        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight">
            Wij staan voor u klaar
        </h1>

        <p class="max-w-2xl mx-auto text-lg text-slate-600 leading-relaxed">
            Heeft u een vraag over onze behandelingen?
            Neem gerust contact met ons op. Wij helpen u graag verder
            met persoonlijke aandacht en duidelijke informatie.
        </p>

        <div class="w-16 h-1 bg-teal-600 rounded-full mx-auto mt-8"></div>

    </div>
</section>

<!-- Contactinformatie -->
<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-10">
            <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                We helpen u graag
            </p>

            <h2 class="text-3xl font-bold text-slate-900 mb-4">
                Neem contact met ons op
            </h2>

            <p class="max-w-2xl mx-auto text-slate-600 leading-relaxed">
                Wilt u meer weten over onze tandheelkundige zorg?
                Hieronder vindt u de verschillende manieren om contact
                met onze praktijk op te nemen.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Telefoon -->
            <div class="group bg-white border border-slate-200 rounded-2xl p-8 text-center shadow-sm hover:shadow-md hover:border-teal-200 transition duration-300">

                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-teal-50 text-teal-700 flex items-center justify-center text-2xl group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <span aria-hidden="true">☎</span>
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-3">
                    Telefoon
                </h3>

                <p class="text-sm text-slate-600 leading-relaxed">
                    Heeft u een vraag? Neem telefonisch contact met ons op.
                    Wij helpen u graag verder.
                </p>

            </div>

            <!-- E-mail -->
            <div class="group bg-white border border-slate-200 rounded-2xl p-8 text-center shadow-sm hover:shadow-md hover:border-teal-200 transition duration-300">

                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-teal-50 text-teal-700 flex items-center justify-center text-2xl group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <span aria-hidden="true">✉</span>
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-3">
                    E-mail
                </h3>

                <p class="text-sm text-slate-600 leading-relaxed">
                    Heeft u een vraag over onze behandelingen?
                    U kunt ons per e-mail bereiken.
                </p>

            </div>

            <!-- Praktijk -->
            <div class="group bg-white border border-slate-200 rounded-2xl p-8 text-center shadow-sm hover:shadow-md hover:border-teal-200 transition duration-300">

                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-teal-50 text-teal-700 flex items-center justify-center text-2xl group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <span aria-hidden="true">⌖</span>
                </div>

                <h3 class="text-lg font-bold text-slate-900 mb-3">
                    Onze praktijk
                </h3>

                <p class="text-sm text-slate-600 leading-relaxed">
                    Wij verwelkomen u graag in onze tandartspraktijk
                    voor persoonlijke tandheelkundige zorg.
                </p>

            </div>

        </div>

        <!-- Openingstijden -->
        <div class="mt-12 bg-slate-50 border border-slate-200 rounded-2xl p-8 md:p-10">

            <div class="max-w-3xl mx-auto text-center">

                <div class="w-14 h-14 mx-auto mb-5 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center text-2xl">
                    <span aria-hidden="true">◷</span>
                </div>

                <h2 class="text-2xl font-bold text-slate-900 mb-4">
                    Openingstijden
                </h2>

                <p class="text-slate-600 leading-relaxed">
                    Wilt u onze praktijk bezoeken? Neem contact met ons op
                    voor informatie over de actuele openingstijden.
                </p>

            </div>

        </div>

    </div>
</section>

<!-- Call to action -->
<section class="bg-teal-700 py-16">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <p class="text-sm font-semibold text-teal-100 uppercase tracking-wide mb-3">
            Nova Tandzorg
        </p>

        <h2 class="text-3xl md:text-4xl font-bold text-white mb-5">
            Zorg voor uw glimlach begint hier
        </h2>

        <p class="text-teal-50 max-w-2xl mx-auto leading-relaxed mb-8">
            Ontdek onze behandelingen en kies een geschikt moment
            voor uw tandartsafspraak.
        </p>

        <a
            href="/diensten"
            class="inline-flex items-center justify-center bg-white text-teal-700 px-7 py-3 rounded-lg font-semibold hover:bg-slate-100 transition duration-300"
        >
            Bekijk onze diensten
            <span class="ml-2" aria-hidden="true">→</span>
        </a>

    </div>
</section>

@endsection