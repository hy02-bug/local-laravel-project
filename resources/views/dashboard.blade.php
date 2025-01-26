{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.template')

@section('main')
<div class="container py-4">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <body>
        <div class="container mt-5">
            <h1>Welcome to the Grant Management System</h1>
            @auth
                <p>Hello, {{ Auth::user()->name }}! You are logged in.</p>
                {{-- <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @else
                <p>Please <a href="{{ route('login') }}">log in</a> to access your dashboard.</p>
                <a href="{{ route('register') }}" class="btn btn-success">Register</a>
            @endauth
        </div>
    </body>
</div>
@endsection

