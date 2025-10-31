<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tallstackui_darkTheme()">

<head>
    @include('partials.head')
</head>

<body class="font-sans antialiased ">
    <header class="flex justify-between items-center p-4 bg-white shadow-md">

        <x-app-logo />

        <div x-data="{ open: false }" class="relative">
            <x-button @click="open = !open">
                <x-icon name="bars-3" class="size-5" />
            </x-button>

            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-500/20 list-none rounded-md shadow-lg z-20">
                @auth
                <div class="flex justify-center flex-col w-full items-center space-y-2 py-4">
                    <x-side-bar.item text="Dashboard" icon="home" :route="route('dashboard')" wire:navigate />
                    <livewire:posts.create />
                </div>
                @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Login</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex flex-col gap-4 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 w-full py-12">
        {{$slot}}
    </main>

    @livewireScripts
</body>

</html>