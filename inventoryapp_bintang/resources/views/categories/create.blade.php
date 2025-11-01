@extends('layouts.master')
@section('title', 'Tambah Kategori Baru')

@section('content')
    <form action="{{ url('/category') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama kategori" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4"
                placeholder="Masukkan deskripsi (opsional)"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url('/category') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection