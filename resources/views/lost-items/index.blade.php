@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-blue-900">
    <h1 class="text-3xl font-bold mb-4 text-white">View Lost Items</h1>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div>
        @foreach ($lostItems as $lostItem)
        <div class="card mb-4">
            <img src="{{ $lostItem->image }}" class="card-img-top" alt="Lost Item Image">
            <div class="card-body">
                <h5 class="card-title">{{ $lostItem->name }}</h5>
                <p class="card-text">{{ $lostItem->description }}</p>
                <p class="card-text">Posted by: {{ $lostItem->user ? $lostItem->user->email : 'Unknown User' }}</p>
                <p class="card-text">Location: {{ $lostItem->location }}</p>
                <p class="card-text">Date Lost: {{ $lostItem->date_lost }}</p>
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

    <div class="mb-4 p-2">
        <a href="{{ route('lost-items.create') }}" class="btn btn-primary bg-blue-500 hover:bg-green-700
         text-white font-bold py-2 px-4 rounded">Add Lost Item</a>
    </div>

</div>
@endsection

@push('styles')
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        background-color: #061037;
        margin-bottom: 16px;
    }

    .card-img-top {
        width: 100%;
        height: auto;
        border-radius: 8px;
        object-fit: cover;
        color: #ddd;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 8px;
        color: #fff;
    }

    .card-text {
        font-size: 16px;
        margin-bottom: 4px;
        color: #fff;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-danger {
        background-color: #dc3545;
    }
</style>
@endpush