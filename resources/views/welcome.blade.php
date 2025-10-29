<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tallstackui_darkTheme()">

<head>
    @include('partials.head')
</head>

<body class="font-sans antialiased">
    <header class="flex justify-between p-4 bg-white shadow-md mb-6 ">
        <h1 class="text-2xl font-bold">{{ config('app.name', 'Laravel') }}</h1>

        <div class="flex items-center space-x-4">
            @auth
            <livewire:posts.create />
            <x-button :text="__('Dashboard')" color="purple" wire:click="$toggle('modal')" sm />
            @else
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline mr-4">Login</a>
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
            @endauth
        </div>
    </header>

    <main class="flex flex-col gap-4 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 w-full">
        <livewire:posts.lists />
    </main>

    @livewireScripts
</body>

</html>