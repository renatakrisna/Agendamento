<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
  <nav class="bg-gray-900">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
      </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
     @guest
         @if (Route::has('login'))
            <a class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page"href="{{ route('register') }}">{{ __('Register') }}</a>
         @endif

         @if (Route::has('register'))
            <a class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page"href="{{ route('login') }}">{{ __('Login') }}</a>
         @endif
     @else
          </div>
     @endguest
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>
       <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
