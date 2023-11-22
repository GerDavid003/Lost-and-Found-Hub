@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-blue-900">
    <h1 class="text-3xl font-bold mb-4 text-white">Post Lost Item</h1>
    <form action="{{ route('lost-items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Add form fields for the details of the lost item -->
        <div class="form-group">
            <label for="title" class="block text-white font-semibold mb-2">Item Name:</label>
            <input type="text" name="name" id="title" class="form-control border border-gray-300 rounded p-2" required>
        </div>

        <div class="form-group mb-4">
            <label for="image" class="block text-white font-semibold mb-2"></label>Upload Image/File</label>
            <input type="file" name="image" id="image" class="form-control border border-gray-300 rounded p-2" required>
        </div>

        <div class="form-group mb-4">
            <label for="description" class="block text-white font-semibold mb-2">Description:</label>
            <textarea name="description" id="description" class="form-control border border-gray-300 rounded p-2" required></textarea>
        </div>

        
        <div class="form-group mb-4">
            <label for="date_found" class="block text-white font-semibold mb-2">Date Lost:</label>
            <input type="date" name="date_found" id="date_found" class="border border-gray-300 rounded p-2" required>
        </div>


        <div class="form-group">
            <label for="location" class="block text-white font-semibold mb-2">Location:</label>
            <input type="text" name="location" id="location" class="form-control border border-gray-300 rounded p-2" required>
        </div>

        <!-- Add more form fields as needed -->
       <div class="mt-4">
       <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
       </div>
        
    </form>
</div>
@endsection