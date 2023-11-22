<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('Dashboard')}}
        </h2>
    </x-slot>

    <div class="main-content bg-gray-900"> <!-- Add the min-h-screen class to make the div fill the whole page height -->
        <div class="py-9">
            <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 flex-grow min-h-fill">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-8 xl:col-span-4">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            <!-- Add your dashboard content here -->
                            @auth
                            <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}</h1>
                            @endauth
                            <!-- Summary or statistics -->
                            <div class="mb-8 h-fill-screen">
                                <h4 class="text-xl font-bold">Summary</h4>
                                <div class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded">
                                    <div class="px-4 py-6">
                                        <p class="text-lg">Total Lost Items: {{ $totalLostItems }}</p>
                                    </div>
                                    <div class="px-4 py-6">
                                        <p class="text-lg">Total Found Items: {{ $totalFoundItems }}</p>
                                    </div>
                                    <div class="px-4 py-6">
                                        <p class="text-lg">Total Users: {{ $totalUsers }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>