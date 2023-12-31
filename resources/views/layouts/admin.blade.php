<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Cache-Control" content="no-store">



    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen md:flex" x-data="{open: true}">
        <!--Sidebar navigation-->
        <aside :class="{ '-translate-x-full': !open}" class="z-10 bg-blue-800 text-blue-100 w-64 px-2 px-4 absolute insert-y-0 left-0 md:relative transform -translate-x-full md:translate-x-0
        overflow-y-auto transition ease-in-out duration 200 shadow-lg">
            <!--Logo-->
            <div class="flex items-center justify-between px-2">
                <div class="flex items-center space-x-2">
                    <a href="">
                        <x-application-logo class="block h-9 w-auto fill-current text-blue-1 00 dark:text-gray-200" />

                    </a>
                    <span class="text-2xl font-extrabold py-10">Admin</span>
                </div>
                <button type="button" @click="open = !open" class="md:hidden inline-flex p-2 item-center justify-center rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>


            <!--Navigation links to pages-->
            <nav>
                <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('lost-items.index') }}" :active="request()->routeIs('lost-items.index')">
                    View Lost Items
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('found-items.index') }}" :active="request()->routeIs('found-items.index')">
                    View Found Items
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('lost-items.create') }}" :active="request()->routeIs('lost-items.create')">
                    Post Lost Items
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('lost-items.create') }}" :active="request()->routeIs('found-items.create')">
                    Post Found Items
                </x-side-nav-link>


            </nav>


        </aside>
        <!--Main page content-->
        <main class="flex-1 bg-gray-900 ">
            <nav class="bg-blue-900 shadow-lg">
                <div class="mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between md:justify-end h-16">
                    </div>
                    <div class="absolute inset-y-0 right-0 flex px-2 py-4">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-100 dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-blue-700
                                p-2 rounded-md dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-200">
                                    @auth
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    @endauth
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </nav>
            <div>
                {{ $slot }}
            </div>
        </main>

    </div>
</body>

</html>