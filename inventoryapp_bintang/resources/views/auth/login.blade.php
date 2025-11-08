@extends('layouts.guest')
@section('title', 'Login')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger p-2 mb-3">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" required>
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Belum punya akun?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Buat akun baru</a>
        </div>
    </form>
@endsection