<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Add your meta tags, CSS links, and other head content here -->
</head>
<body class="font-sans antialiased">
    <div class="flex">
        <!-- Side Navigation -->
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            <!-- Side Navigation Content -->
            <div class="p-4 bg-gray-900 text-white">
                <h2 class="text-xl font-semibold">Dashboard</h2>
            </div>
            <ul class="p-4">
                <li class="py-2">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-300">Home</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('lost-items.index') }}" class="text-white hover:text-gray-300">View Lost Items</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('found-items.index') }}" class="text-white hover:text-gray-300">View Found Items</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('lost-items.create') }}" class="text-white hover:text-gray-300">Post Lost Item</a>
                </li>
                <!-- Add more navigation items as needed -->
            </ul>

            <!-- Main Content -->
            <div class="flex flex-col flex-1">
                <!-- Add your main content here -->
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
