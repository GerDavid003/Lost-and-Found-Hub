@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-blue-900">
    <h1 class="text-3xl font-bold mb-4 text-white">View Lost Items</h1>
    <div class="mb-4 p-2">
        <a href="{{ route('lost-items.create') }}" class="btn btn-primary bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Lost Item</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div>
        @foreach ($lostItems as $lostItem)
        <div class="card mb-4">
            <img src="{{ asset('storage/' . $lostItem->image) }}" class="card-img-top" alt="Lost Item Image">
            <div class="card-body">
                <h5 class="card-title">{{ $lostItem->title }}</h5>
                <p class="card-text">{{ $lostItem->description }}</p>
                <p class="card-text">Posted by: {{ $lostItem->user->email }}</p>
                <p class="card-text">Location: {{ $lostItem->location }}</p>
                <p class="card-text">Date Found: {{ $lostItem->date_found }}</p>
                @if (auth()->id() == $lostItem->user_id)
                <div class="btn-group">
                    <a href="{{ route('lost-items.edit', $lostItem->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('lost-items.destroy', $lostItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection