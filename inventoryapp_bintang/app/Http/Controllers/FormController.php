<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Memproses data dari form dan menampilkan halaman selamat datang.
     */
    public function welcome(Request $request)
    {
        // Mengambil data nama depan dan nama belakang dari request
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');

        // Mengirim data ke view 'welcome'
        return view('welcome', [
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);
    }
}