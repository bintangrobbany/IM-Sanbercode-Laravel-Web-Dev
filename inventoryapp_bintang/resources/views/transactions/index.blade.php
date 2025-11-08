@extends('layouts.master')
@section('title', 'Daftar Transaksi')

@section('content')
    <a href="{{ url('/transaction/create') }}" class="btn btn-primary mb-3">Buat Transaksi Baru</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Catatan</th>
                    <th>Oleh</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>
                            @if ($transaction->type == 'in')
                                <span class="badge bg-success">Masuk</span>
                            @else
                                <span class="badge bg-danger">Keluar</span>
                            @endif
                        </td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->notes ?? '-' }}</td>
                        <td>{{ $transaction->user->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection