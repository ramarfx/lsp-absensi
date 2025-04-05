<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Absensi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layout.partials.topbar')

    @include('layout.partials.sidebar')

    <main>
        <div class="p-4 sm:ml-64">
            <div class="p-4 mt-14">
                <h1 class="font-bold text-2xl mb-4">@yield('header')</h1>
                @if (session()->has('error'))
                    <div class="flex items-center px-4 py-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
                        role="alert">
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Error!</span> {{ session('error') }}
                        </div>
                    </div>
                @elseif (session()->has('success'))
                    <div class="flex items-center px-4 py-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                        role="alert">
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Sukses!</span> {{ session('success') }}
                        </div>
                    </div>
                @endif

                @error('*')
                    <div class="flex items-center px-4 py-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
                        role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Error!</span> {{ $message }}
                        </div>
                    </div>
                @enderror

                @yield('content')
            </div>
        </div>
    </main>

    @yield('script')
</body>

</html>
