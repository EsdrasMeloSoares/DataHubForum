<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tallstackui_darkTheme()">

<head>
    @include('partials.head')
</head>

<body class="font-sans antialiased"
    x-cloak
    x-data="{ name: @js(auth()->user()->name) }"
    x-on:name-updated.window="name = $event.detail.name"
    x-bind:class="{ 'dark bg-gray-800': darkTheme, 'bg-gray-100': !darkTheme }">
    <x-layout>
        <x-slot:top>
            <x-dialog />
            <x-toast />
        </x-slot:top>
        <x-slot:header>
            <x-layout.header>
                <x-slot:left>
                    <x-theme-switch />
                </x-slot:left>
                <x-slot:right>
                    <x-dropdown>
                        <x-slot:action>
                            <div>
                                <button class="cursor-pointer" x-on:click="show = !show">
                                    <span class="text-base font-semibold text-primary-500" x-text="name"></span>
                                </button>
                            </div>
                        </x-slot:action>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown.items :text="__('Profile')" :href="route('user.profile')" />
                            <x-dropdown.items :text="__('Logout')" onclick="event.preventDefault(); this.closest('form').submit();" separator />
                        </form>
                    </x-dropdown>
                </x-slot:right>
            </x-layout.header>
        </x-slot:header>
        <x-slot:menu>
            <x-side-bar smart collapsible>
                <x-slot:brand>
                    <div class="mt-8 flex items-center justify-center">
                        <img src="{{ asset('/assets/images/tsui.png') }}" width="40" height="40" />
                    </div>
                </x-slot:brand>
                <x-side-bar.item text="Dashboard" icon="home" :route="route('dashboard')" wire:navigate />
                <x-side-bar.item text="Users" icon="users" :route="route('users.index')" wire:navigate />
                <x-side-bar.item text="Meus Posts" icon="newspaper" :route="route('posts.index')" wire:navigate />
                <x-side-bar.item text="Welcome Page" icon="arrow-uturn-left" :route="route('welcome')" wire:navigate />
            </x-side-bar>
        </x-slot:menu>
        {{ $slot }}
    </x-layout>
    @livewireScripts
</body>

</html>