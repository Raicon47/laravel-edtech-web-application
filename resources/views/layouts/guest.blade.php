<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans">

        <section>
            <nav class="navbar navbar-expand-lg bg-white shadow">
                <div class="container-fluid">
                  <a class="navbar-brand fw-bold" href="/" style="color:#5a0b4d;">Krator</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Contact</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Blog</a>
                      </li>
                    </ul>
                    <form class="d-flex" role="search">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="btn text-light mx-1" style="background:#5a0b4d;" type="submit">Dashboard</a>
                        @else
                      <a href="{{ url('login') }}"  class="btn btn-dark mx-1" type="submit">Login</a>
                      @if (Route::has('register'))
                      <a href="{{ url('register') }}" class="btn text-light mx-1" style="background:#5a0b4d;" type="submit">Register</a>
                      @endif
                      @endauth
                      @endif
                    </form>
                  </div>
                </div>
              </nav>
        </section>

       @livewire('topic')

        <div class="">
            <div>
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                </a>
            </div>

            <div class="">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
