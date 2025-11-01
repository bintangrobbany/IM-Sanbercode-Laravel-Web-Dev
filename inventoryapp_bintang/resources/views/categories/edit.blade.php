@extends('layouts.master')
@section('title', 'Edit Kategori')

@section('content')
    <form action="{{ url('/category/' . $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"
                rows="4">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ url('/category') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection