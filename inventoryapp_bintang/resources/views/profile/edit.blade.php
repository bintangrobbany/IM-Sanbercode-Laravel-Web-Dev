@extends('layouts.master')

{{-- Judul dinamis: Jika profile sudah ada, "Edit Profile", jika tidak, "Buat Profile" --}}
@section('title', $profile ? 'Edit Profile' : 'Buat Profile')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            {{-- Tampilkan data lama jika ada, jika tidak, tampilkan input kosong --}}
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $profile->age ?? '') }}"
                required>
        </div>
        <div class="mb-3">
            <label for="biodata" class="form-label">Biodata</label>
            {{-- Tampilkan data lama jika ada, jika tidak, tampilkan textarea kosong --}}
            <textarea class="form-control" id="biodata" name="biodata" rows="5"
                required>{{ old('biodata', $profile->biodata ?? '') }}</textarea>
        </div>

        {{-- Tombol dinamis: Jika profile sudah ada, "Update", jika tidak, "Submit" --}}
        <button type="submit" class="btn btn-primary">{{ $profile ? 'Update' : 'Submit' }}</button>
    </form>
@endsection