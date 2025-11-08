<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Method untuk menampilkan halaman create/edit profile
    public function edit()
    {
        // Ambil data profil dari user yang sedang login
        $profile = Auth::user()->profile;

        return view('profile.edit', compact('profile'));
    }

    // Method untuk menyimpan atau mengupdate profil
    public function update(Request $request)
    {
        $request->validate([
            'age' => 'required|integer|min:1',
            'biodata' => 'required|string|max:1000',
        ]);

        $userId = Auth::id();

        // Gunakan updateOrCreate untuk menangani create dan update sekaligus
        // Cari profil berdasarkan user_id, jika tidak ada, buat baru.
        // Jika ada, update datanya.
        $profile = \App\Models\Profile::updateOrCreate(
            ['user_id' => $userId],
            [
                'age' => $request->age,
                'biodata' => $request->biodata,
            ]
        );

        return redirect()->route('profile.edit')->with('alert', [
            'type' => 'success',
            'message' => 'Profil berhasil diperbarui!'
        ]);
    }
}