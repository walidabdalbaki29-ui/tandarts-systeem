<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tandartspraktijk')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @if (!request()->routeIs('login', 'register'))

    @if (request()->routeIs('admin.*'))

    {{-- Admin Navbar --}}
    <nav class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between min-h-20 gap-6">

                <a href="{{ route('admin.dashboard') }}"
                    class="text-xl font-bold text-slate-900 whitespace-nowrap">
                    Nova Tandzorg
                    <span class="text-teal-600">Admin</span>
                </a>

                <div class="hidden md:flex items-center gap-6">

                    <a href="{{ route('admin.dashboard') }}"
                        class="font-medium transition {{ request()->routeIs('admin.dashboard') ? 'text-teal-700' : 'text-slate-600 hover:text-teal-600' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.dashboard') }}"
                        class="text-slate-600 hover:text-teal-600 transition">
                        Afspraken beheren
                    </a>

                    <a href="{{ route('admin.dashboard') }}"
                        class="text-slate-600 hover:text-teal-600 transition">
                        Diensten beheren
                    </a>

                    <a href="{{ route('home') }}"
                        class="text-slate-600 hover:text-teal-600 transition">
                        Website bekijken
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="bg-teal-600 text-white px-5 py-3 rounded-lg hover:bg-teal-700 transition">
                            Uitloggen
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </nav>

    @else

    {{-- Website Navbar --}}
    <nav class="sticky top-0 z-50 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center h-20">

                <a href="{{ route('home') }}"
                    class="text-xl font-bold text-gray-900 shrink-0">
                    Nova Tandzorg
                </a>

                <div class="hidden md:flex items-center gap-5 ml-auto whitespace-nowrap">

                    <a href="{{ route('home') }}"
                        class="text-gray-700 hover:text-teal-600">
                        Home
                    </a>

                    <a href="{{ route('services.index') }}"
                        class="text-gray-700 hover:text-teal-600">
                        Diensten
                    </a>

                    <a href="{{ route('over-ons') }}"
                        class="text-gray-700 hover:text-teal-600">
                        Over ons
                    </a>

                    <a href="{{ route('contact') }}"
                        class="text-gray-700 hover:text-teal-600">
                        Contact
                    </a>

                    @guest
                    <a href="{{ route('login') }}"
                        class="text-gray-700 hover:text-teal-600">
                        Inloggen
                    </a>

                    <a href="{{ route('register') }}"
                        class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-700 transition">
                        Account aanmaken
                    </a>
                    @endguest

                    @auth
                    @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-gray-700 hover:text-teal-600">
                        Admin Dashboard
                    </a>
                    @else
                    <a href="{{ route('appointments.index') }}"
                        class="text-gray-700 hover:text-teal-600">
                        Mijn afspraken
                    </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-700 transition">
                            Uitloggen
                        </button>
                    </form>
                    @endauth

                </div>

            </div>
        </div>
    </nav>

    @endif

    @endif

    @yield('content')
    <footer class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div>
                    <h2 class="text-xl font-bold mb-3">
                        Tandarts Praktijk
                    </h2>

                    <p class="text-slate-400 text-sm leading-relaxed">
                        Professionele en persoonlijke tandzorg voor een gezonde en stralende glimlach.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">
                        Navigatie
                    </h3>

                    <div class="flex flex-col gap-2 text-sm">
                        <a href="/" class="text-slate-400 hover:text-white transition">Home</a>
                        <a href="/diensten" class="text-slate-400 hover:text-white transition">Diensten</a>
                        <a href="/over-ons" class="text-slate-400 hover:text-white transition">Over ons</a>
                        <a href="/contact" class="text-slate-400 hover:text-white transition">Contact</a>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">
                        Contact
                    </h3>

                    <div class="text-sm text-slate-400 space-y-2">
                        <p>Rotterdamstraat 10</p>
                        <p>3000 AA Rotterdam</p>
                        <p>010 - 123 45 67</p>
                        <p>info@tandartspraktijk.nl</p>
                    </div>
                </div>

            </div>

            <div class="border-t border-slate-700 mt-8 pt-6">
                <p class="text-sm text-slate-500 text-center">
                    © 2026 Tandarts Praktijk. Alle rechten voorbehouden.
                </p>
            </div>

        </div>
    </footer>
</body>

</html>