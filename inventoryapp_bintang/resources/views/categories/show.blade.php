@extends('layouts.master')
@section('title', 'Detail Kategori')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h1 class="h3 mb-0 text-gray-800">Detail Kategori</h1>
        </div>
        <div class="card-body">
            {{-- Variabel $category didapat dari controller --}}
            <h5 class="card-title">Nama Kategori: {{ $category->name }}</h5>
            <p class="card-text">Dibuat pada: {{ $category->created_at->format('d F Y H:i:s') }}</p>
            <p class="card-text">Terakhir diupdate: {{ $category->updated_at->format('d F Y H:i:s') }}</p>
            
            <a href="{{ url('/category') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection