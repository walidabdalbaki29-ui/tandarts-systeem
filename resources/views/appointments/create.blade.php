@extends('layouts.app')

@section('title', 'Afspraak maken')

@section('content')

<section class="bg-slate-50 py-12">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden mb-8">

            <div class="grid grid-cols-1 lg:grid-cols-2">

                <div class="p-8 flex flex-col justify-center">

                    <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-3">
                        Afspraak maken
                    </p>

                    <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                        Maak eenvoudig een afspraak
                    </h1>

                    <p class="text-slate-600 leading-relaxed">
                        Kies een geschikte datum en tijd voor uw afspraak.
                        Wij bevestigen uw afspraak na het indienen van uw aanvraag.
                    </p>

                </div>

                <div class="h-64 lg:h-auto bg-slate-200">
                    <img
                        src="/images/Home-page.jpeg"
                        alt="Tandartspraktijk"
                        class="w-full h-full object-cover">
                </div>

            </div>

        </div>


        <!-- Booking area -->
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            <!-- Left: formulier -->
            <div class="w-full lg:w-2/3">

                @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
                    @foreach ($errors->all() as $error)
                    <p class="text-sm text-red-600">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf

                    <input type="hidden" name="service_id" value="{{ $service->id }}">

                    <div class="bg-white rounded-2xl border border-slate-200 p-8">

                        <!-- Step 1 -->
                        <div class="mb-10">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center font-bold shrink-0">1</div>
                                <div class="flex-1">
                                    <h2 class="font-bold text-slate-900 mb-1">Kies een datum</h2>
                                    <p class="text-sm text-slate-500 mb-4">Selecteer een beschikbare datum voor uw afspraak.</p>
                                    <input
                                        type="date"
                                        id="appointment_date"
                                        name="appointment_date"
                                        min="{{ date('Y-m-d') }}"
                                        class="w-full border border-slate-300 rounded-lg px-4 py-3">
                                </div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="mb-10">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center font-bold shrink-0">2</div>
                                <div class="flex-1">
                                    <h2 class="font-bold text-slate-900 mb-1">Kies een tijdstip</h2>
                                    <p class="text-sm text-slate-500 mb-4">Selecteer een beschikbare tijd.</p>

                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                        @foreach (['07:00', '08:00', '09:00', '10:00', '11:00', '13:00'] as $time)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="appointment_time" value="{{ $time }}" class="peer sr-only">
                                            <span class="block text-center border border-slate-300 rounded-lg px-4 py-2 text-sm
                                                     peer-checked:bg-teal-600 peer-checked:text-white peer-checked:border-teal-600
                                                     hover:border-teal-600">
                                                {{ $time }}
                                            </span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="mb-8">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center font-bold shrink-0">3</div>
                                <div class="flex-1">
                                    <h2 class="font-bold text-slate-900 mb-1">Opmerkingen</h2>
                                    <p class="text-sm text-slate-500 mb-4">Heeft u speciale wensen of opmerkingen? Laat het ons weten.</p>
                                    <textarea
                                        name="notes"
                                        rows="4"
                                        class="w-full border border-slate-300 rounded-lg px-4 py-3 resize-none"
                                        placeholder="Uw opmerkingen..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-between border-t border-slate-200 pt-6">
                            <a href="/diensten" class="border border-slate-300 text-slate-700 px-5 py-2 rounded-lg">
                                Vorige
                            </a>

                            <button
                                type="submit"
                                class="bg-teal-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-teal-700 transition">
                                Bevestig
                            </button>
                        </div>

                    </div>
                </form>

            </div>
            <!-- Einde linkerkolom -->


            <!-- Right: samenvatting -->
            <div class="w-full lg:w-1/3">

                <div class="bg-teal-50 rounded-2xl border border-teal-100 p-6 sticky top-6">

                    <h2 class="font-bold text-slate-900 mb-6">Samenvatting</h2>

                    <div class="space-y-5">
                        <div>
                            <p class="text-xs text-slate-500">Dienst</p>
                            <p class="font-semibold text-slate-900 mt-1">{{ $service->name }}</p>
                        </div>

                        <div>
                            <p class="text-xs text-slate-500">Datum</p>
                            <p id="summary_date" class="text-sm text-slate-700 mt-1">Nog niet gekozen</p>
                        </div>

                        <div>
                            <p class="text-xs text-slate-500">Tijd</p>
                            <p id="summary_time" class="text-sm text-slate-700 mt-1">Nog niet gekozen</p>
                        </div>
                    </div>

                    <div class="border-t border-teal-200 mt-6 pt-6">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-white flex items-center justify-center">✓</div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Veilig en betrouwbaar</p>
                                <p class="text-xs text-slate-500">Uw gegevens zijn goed beveiligd.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<script>
    const appointmentDate = document.getElementById('appointment_date');
    const summaryDate = document.getElementById('summary_date');

    appointmentDate.addEventListener('change', function() {
        summaryDate.textContent = this.value;
    });

    const appointmentTimes = document.querySelectorAll(
        'input[name="appointment_time"]'
    );

    const summaryTime = document.getElementById('summary_time');

    appointmentTimes.forEach(function(time) {
        time.addEventListener('change', function() {
            summaryTime.textContent = this.value;
        });
    });
</script>
@endsection