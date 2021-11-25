@extends('layouts.default')

@section('title')
    PageBleue
@endsection

@section('body')

    <nav class="navbar navbar-dark bg-dark justify-content-around border-bottom">
        <a class="navbar-brand" href="{{url('/')}}">
            Bienvenue sur PageBleue
        </a>

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
        @endif
    </div>
    </nav>

<nav class="navbar navbar-dark justify-content-around">
    <form action="/entreprise" method="get">
        @csrf
        @method('get')
        <button class="btn btn-primary">Voir les entreprises</button>
    </form>

    <form action="/collaborateur" method="get">
        @csrf
        @method('get')
        <button class="btn btn-primary">Voir les collaborateurs</button>
    </form>
</nav>
@endsection