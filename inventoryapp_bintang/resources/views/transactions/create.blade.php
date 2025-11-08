@extends('layouts.master')
@section('title', 'Buat Transaksi Baru')

@section('content')
<form action="{{ url('/transaction') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="product_id" class="form-label">Produk</label>
        <select class="form-control" id="product_id" name="product_id" required>
            <option value="">-- Pilih Produk --</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }} (Stok: {{ $product->stock }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipe Transaksi</label>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type_in" value="in" checked>
                <label class="form-check-label" for="type_in">Barang Masuk</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type_out" value="out">
                <label class="form-check-label" for="type_out">Barang Keluar</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Jumlah (Amount)</label>
        <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required>
        @error('amount')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="notes" class="form-label">Catatan (Notes)</label>
        <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    <a href="{{ url('/transaction') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection