  <x-app-layout>
      <x-slot name="header">
          <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              {{__('Dashboard')}}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900 dark:text-gray-100">

                      <!-- Add your dashboard content here -->
                      <div class="container">
                          <h1>Welcome, {{ Auth::user()->name }}</h1>
                          <!-- Display user's profile picture -->
                          <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture">

                          <!-- Summary or statistics -->
                          <div class="summary">
                              <h3>Summary</h3>
                              <p>Total Lost Items: {{ $totalLostItems }}</p>
                              <p>Total Found Items: {{ $totalFoundItems }}</p>
                              <p>Total Users: {{ $totalUsers }}</p>
                          </div>


                          <!-- Quick links or shortcuts -->
                          <div class="quick-links">
                              <h3>Quick Links</h3>
                              <ul>
                                  <li><a href="{{ route('lost-items.index') }}">View Lost Items</a></li>
                                  <li><a href="{{ route('found-items.index') }}">View Found Items</a></li>
                                  <li><a href="{{ route('lost-items.create') }}">Post Lost Item</a></li>
                              </ul>
                          </div>

                          <!-- Action buttons -->
                          <div class="actions">
                              <h3>Actions</h3>
                              <button>Create New Item</button><br
                              <button>Initiate Process</button>
                          </div>

                          <!-- Data visualization 
                          <div class="data-visualization">
                              <h3>Data Visualization</h3>
                               Add your chart or graph component here 
                          </div>-->

                          <!-- Personalized recommendations 
                          <div class="recommendations">
                              <h3>Personalized Recommendations</h3>
                              <ul>
                                  <li>Suggestion 1</li>
                                  <li>Suggestion 2</li>
                                  <li>Suggestion 3</li>
                              </ul>
                          </div>-->

                      </div>
                  </div>
              </div>
          </div>


  </x-app-layout>