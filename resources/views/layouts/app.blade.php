<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ isset($title) ? ' | '.$title : "" }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="h-screen flex overflow-hidden bg-gray-100" x-data="{ openUser: false, openMenu:false }">
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            @include('layouts.sidebar-mobile')
          
            <!-- Static sidebar for desktop -->
            @include('layouts.sidebar')
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
              @include('layouts.navbar')
          
              <main class="flex-1 relative overflow-y-auto focus:outline-none" tabindex="0">
                <div class="py-2">
                    @if (isset($header))
                        {{ $header }}
                    @endif
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        {{ $slot }}
                        <!-- /End replace -->
                    </div>
                </div>
              </main>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            var userId = "{{ Auth::id() }}";

            Echo.private(`App.Models.User.`+userId).notification((notification) => {
                Livewire.emit('fetchNotify');
            });

        </script>
        @livewireScripts
    </body>
</html>
