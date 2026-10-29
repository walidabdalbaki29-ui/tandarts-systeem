@extends('layouts.app')

@section('title', 'Diensten')

@section('content')

@if (session('success')) <div class="max-w-7xl mx-auto px-6 mt-6"> <div class="rounded-lg border border-green-200 bg-green-50 p-4"> <p class="font-semibold text-green-700">
{{ session('success') }} </p> </div> </div>
@endif


<section class="bg-slate-50 py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-12">
            <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                Onze diensten
            </p>

            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-5">
                Tandheelkundige zorg op maat
            </h1>

            <p class="text-slate-600 leading-relaxed">
                Bekijk ons aanbod van tandheelkundige behandelingen
                en kies de zorg die bij u past.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($services as $service)

            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">

                <div class="h-52 bg-teal-50 overflow-hidden">
                    <img
                        src="{{ asset('images/' . $service->image) }}"
                        alt="{{ $service->name }}"
                        class="w-full h-full object-cover">
                </div>

                <div class="p-6">

                    <h2 class="text-xl font-bold text-slate-900 mb-3">
                        {{ $service->name }}
                    </h2>

                    <p class="text-slate-600 text-sm leading-relaxed mb-5">
                        {{ $service->description }}
                    </p>

                    <div class="flex items-center justify-between mb-5">

                        <div>
                            <p class="text-sm text-slate-500">
                                Vanaf
                            </p>

                            <p class="text-lg font-bold text-slate-900">
                                € {{ number_format($service->price, 2, ',', '.') }}
                            </p>
                        </div>

                        <div class="text-sm text-slate-500">
                            {{ $service->duration }} min
                        </div>

                    </div>

                    <a
                        href="{{ route('appointments.create', ['service' => $service->id]) }}"
                        class="block text-center bg-teal-600 text-white px-5 py-3 rounded-lg font-semibold hover:bg-teal-700 transition">
                        Afspraak maken
                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>
    <div class="mt-16 bg-blue-50 border border-blue-100 rounded-2xl p-6 md:p-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-5">

            <div>
                <h2 class="text-xl font-bold text-slate-900">
                    Heeft u vragen over onze behandelingen?
                </h2>

                <p class="text-sm text-slate-600 mt-1">
                    Neem gerust contact met ons op voor meer informatie.    
                </p>
            </div>

            <a
                href="{{ route('contact') }}"
                class="bg-teal-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-teal-700 transition whitespace-nowrap">
                contact opnemen
            </a>

        </div>
    </div>
</section>

@endsection